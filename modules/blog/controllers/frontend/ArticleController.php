<?php
namespace modules\blog\controllers\frontend;

use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;
use yii\helpers\Inflector;
use yii\data\ActiveDataProvider;
use modules\blog\models\frontend\Article; 

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
		$model = new Article();	
		$model->load(Yii::$app->request->post(), '');
		$model->image = UploadedFile::getInstanceByName('image');
		$model->status = 1;
		if ($model->upload()) {
			$model->save();
		}
		return $model;
	}
	
}