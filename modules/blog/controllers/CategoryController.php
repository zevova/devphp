<?php
namespace app\modules\blog\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;
use app\modules\blog\models\Category; 

class CategoryController extends ActiveController
{
    public $modelClass = 'app\modules\blog\models\Category';
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
            'query' => Category::find()
				->where(['status' => 1]),
        ]);
	}
	
	public function actionCreate()
	{
		$model = new Category();	
		$model->load(Yii::$app->request->post(), '');
		$model->image = UploadedFile::getInstanceByName('image');
		$model->alias = $model->alias ? $model->alias : Inflector::slug($model->title);
		$model->status = 1;
		if ($model->upload()) {
			$model->save();
		}
		return $model;
	}
	
}