<?php

namespace app\modules\blog\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sub', 'alias', 'title', 'description', 'image', 'status'], 'required'],
            [['id', 'sub', 'status'], 'integer'],
            [['title', 'description'], 'string'],
			[['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['alias', 'image'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sub' => Yii::t('app', 'Sub'),
            'alias' => Yii::t('app', 'Alias'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
	
	public function upload()
    {
        if ($this->validate()) {
			if (isset($this->image)) {
				$this->image->name = date('dmYHis').'_'. uniqid() . '.' . $this->image->extension;
				$this->image->saveAs('uploads/' . $this->image->name , false);
			}
            return true;
        } else {
            return false;
        }
    }	
	
}
