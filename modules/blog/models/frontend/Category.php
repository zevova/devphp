<?php
namespace modules\blog\models\frontend;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\SluggableBehavior;

use modules\blog\models\frontend\query\CategoryQuery;

class Category extends \yii\db\ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'status'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['alias'], 'unique'],
            [['alias'], 'string', 'max' => 128],
            [['title', 'description'], 'string'],
			[['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
			['parent_id', 'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Parent id'),
            'alias' => Yii::t('app', 'Alias'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
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
	
	public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['parent_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasMany(Category::className(), ['id' => 'parent_id']);
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
