<?php

namespace modules\blog\models\frontend;

use Yii;

/**
 * This is the model class for table "article_tag".
 *
 * @property integer $article_id
 * @property integer $tag_id
 */
class ArticleTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'tag_id'], 'required'],
            [['article_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => Yii::t('app', 'Article ID'),
            'tag_id' => Yii::t('app', 'Tag ID'),
        ];
    }
}
