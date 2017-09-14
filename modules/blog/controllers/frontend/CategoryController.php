<?php
namespace modules\blog\controllers\frontend;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;

use modules\blog\models\frontend\Category; 

class CategoryController extends ActiveController
{
    public $modelClass = 'modules\blog\models\frontend\Category';
	public $image;
	
	public function actions()
	{
		$actions = parent::actions();
		unset($actions['index'], $actions['create']);
		return $actions;
	}

	public function actionIndex()
	{
		$query = Category::find()
			->published()
			->asArray();
		$rows = $query->all();
		
		return Category::getTree($rows);
	}
	
	public function actionCreate()
	{
		$model = new Category();
		$model->load(Yii::$app->request->post(), '');
		$model->image = UploadedFile::getInstanceByName('image');
		$model->status = 1;
		if ($model->upload()) {
			$model->save();
		}
		return $model;
	}
	
	
	
}