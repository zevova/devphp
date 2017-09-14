<?php

namespace modules\blog\models\frontend;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $article_id
 * @property integer $category_id
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'category_id'], 'required'],
            [['article_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => Yii::t('app', 'Article ID'),
            'category_id' => Yii::t('app', 'Category ID'),
        ];
    }
}
