<?php
namespace modules\blog\controllers\frontend;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;
use modules\blog\models\frontend\Article; 
use modules\blog\models\frontend\Category; 
use modules\blog\models\frontend\Tag; 
use modules\blog\models\frontend\ArticleCategory; 
use modules\blog\models\frontend\ArticleTag; 

class ArticleController extends ActiveController
{
    public $modelClass = 'modules\blog\models\frontend\Article';
	public $image;
	
	public function actions()
	{
		$actions = parent::actions();
		unset(
			$actions['index'],
			$actions['view'], 
			$actions['create']
		);
		return $actions;
	}

	public function actionIndex($categoryId = null, $tagId = null)
	{	
		$query = Article::find();
		if ($categoryId !== null) {
			$query = $query->leftJoin('article_category', 'article_category.article_id = id')
			->where(['article_category.category_id' => $categoryId]);
		}
		if ($tagId !== null) {
			$query = $query->leftJoin('article_tag', 'article_tag.article_id = id')
			->where(['article_tag.tag_id' => $tagId]);
		}
		$query = $query->with([
			'categories' => function ($query) {
				$query->andWhere(['status' => Category::STATUS_ACTIVE]);
			},
			'tags' => function ($query) {
				$query->andWhere(['status' => Tag::STATUS_ACTIVE]);
			},
			])
			->published()
			->asArray();
		
		return new ActiveDataProvider([
            'query' => $query,
			'sort' => ['defaultOrder' => ['title' => SORT_ASC,]
			]
        ]);
	}
	
	public function actionView($id, $categoryId = null, $tagId = null)
	{	
		$query = Article::find();
		if ($categoryId !== null) {
			$query = $query->leftJoin('article_category', 'article_category.article_id = id')
			->where(['article_category.category_id' => $categoryId]);
		}
		if ($tagId !== null) {
			$query = $query->leftJoin('article_tag', 'article_tag.article_id = id')
			->where(['article_tag.tag_id' => $tagId]);
		}
		
		$query = $query->with([
			'categories' => function ($query) {
				$query->andWhere(['status' => Category::STATUS_ACTIVE]);
			},
			'tags' => function ($query) {
				$query->andWhere(['status' => Tag::STATUS_ACTIVE]);
			},
			])
			->where(['id' => $id])
			->published()
			->asArray()
			->one();
        return $query;
	}
	
	public function actionCreate()
	{
		$article = new Article();		
		$article->load(Yii::$app->request->post(), '');
		$article->image = UploadedFile::getInstanceByName('image');
		$article->status = 1;
		if ($article->upload()) {
			if ($article->save()) {
				self::saveCategory($article->category, $article->id);
				self::saveTag($article->tag, $article->id);
			}
		}
		return $article;
	}
	
	protected function saveCategory($categories, $articleId)
	{
		$categories = is_array($categories) ? $categories : [$categories];
		foreach ($categories as $category) {
			$model = new ArticleCategory();
			$model->article_id = $articleId;
			$model->category_id = $category;
			$model->save();					
		}
	}
	
	protected function saveTag($tags, $articleId)
	{
		foreach (explode(',', $tags) as $tag) {
			$tagId = self::CreateTag($tag);
			$model = new ArticleTag();
			$model->article_id = $articleId;
			$model->tag_id = $tagId;
			$model->save();
		}
	}
	
	protected function CreateTag($title)
	{
		$model = Tag::find()
			->where([
				'title' => $title,
			])
			->one();
		if ($model == null) {
			$model = new Tag();
			$model->title = $title;
			$model->status = 1;
			$model->save();
			return $model->id;
		}
		return $model->id;
	}	
	
}