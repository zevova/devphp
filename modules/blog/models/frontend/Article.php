<?php
namespace modules\blog\models\frontend;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

use modules\blog\models\frontend\Category;
use modules\blog\models\frontend\Tag;
use modules\blog\models\frontend\query\ArticleQuery;

class Article extends \yii\db\ActiveRecord
{
	const STATUS_INACTIVE = 0;
	const STATUS_ACTIVE = 1;
	
    public $category;
    public $tag;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'user_id', 'status', 'category'], 'required'],
            [['alias'], 'unique'],
            [['alias', 'title', 'content'], 'string'],
			[['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['user_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['category', 'tag'], 'safe'],
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
            'content' => Yii::t('app', 'Content'),
            'image' => Yii::t('app', 'Image'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'category' => Yii::t('app', 'Category'),
            'tag' => Yii::t('app', 'Tag'),
        ];
    }
	
	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
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
        return new ArticleQuery(get_called_class());
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
	
    public function getCategories()
	{
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('article_category', ['article_id' => 'id'])
			->select(['id', 'title']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id'])
			->select(['id', 'title']);
    }
	
}
