<?php
namespace modules\blog\controllers\frontend;

use Yii;
use yii\rest\ActiveController;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;

use modules\blog\models\frontend\Tag; 

class TagController extends ActiveController
{
    public $modelClass = 'modules\blog\models\frontend\Tag';
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
            'query' => Tag::find()
				->where(['status' => 1]),
        ]);
	}
	
	public function actionCreate()
	{
		$model = new Tag();
		$model->load(Yii::$app->request->post(), '');
		$model->status = 1;
		$model->save();
		return $model;
	}
	
	
	
}