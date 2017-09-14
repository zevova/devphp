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
        return new ActiveDataProvider([
            'query' => Article::find()
				->where(['status' => 1]),
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
		foreach ($categories as $category) {
			$articleCategory = new ArticleCategory();
			$articleCategory->article_id = $articleId;
			$articleCategory->category_id = $category;
			$articleCategory->save();					
		}
	}
	
	protected function saveTag($tags, $articleId)
	{
		foreach (explode(',', $tags) as $tag) {
			$tagId = self::CreateTag();
			$articleCategory = new ArticleTag();
			$articleCategory->article_id = $articleId;
			$articleCategory->category_id = $tagId;
			$articleCategory->save();					
		}
	}
	
	protected function CreateTag()
	{
		$articleCategory = new Tag();
		$articleCategory->save();					
	}	
	
}