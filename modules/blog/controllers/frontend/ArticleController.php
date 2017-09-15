<?php
namespace modules\blog\controllers\frontend;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;
use modules\blog\models\frontend\Article; 
use modules\blog\models\frontend\ArticleCategory; 
use modules\blog\models\frontend\Tag; 
use modules\blog\models\frontend\ArticleTag; 

class ArticleController extends ActiveController
{
    public $modelClass = 'modules\blog\models\frontend\Article';
	public $image;
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'], $actions['create']);
		return $actions;
	}

	public function actionIndex()
	{
		var_dump($this);
		return new ActiveDataProvider([
            'query' => Article::find()
				->with('tags', 'categories')
				->published()
				->asArray()
        ]);
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