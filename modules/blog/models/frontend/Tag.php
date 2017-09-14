<?php

namespace modules\blog\models\frontend;

use Yii;
use yii\behaviors\SluggableBehavior;

class Tag extends \yii\db\ActiveRecord
{

	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'title', 'status'], 'required'],
            [['status'], 'integer'],
            [['alias'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
	
	public function behaviors()
    {
        return [
			[
				'class' => SluggableBehavior::className(),
				'attribute' => 'title',
				'slugAttribute' => 'alias',
				'immutable' => true,
				'ensureUnique' => true,
			],
        ];
    }
	
}
