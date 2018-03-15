<?php

namespace yozh\product\controllers;

use yozh\crud\controllers\DefaultController as Controller;
use yozh\product\models\ProductModel;
use yii\data\ActiveDataProvider;

class DefaultController extends Controller
{
	protected static function defaultModel()
	{
		return ProductModel::className();
	}
	
	public function actionIndex()
	{
		
		$searchModel = new ProductModel();
		
		$dataProvider = new ActiveDataProvider([
			'query' => $searchModel::find(),
		]);
		
		
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
		
	}
	
	
}
