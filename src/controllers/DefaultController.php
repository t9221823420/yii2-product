<?php

namespace yozh\product\controllers;

use yozh\crud\controllers\DefaultController as Controller;
use yozh\product\models\ProductModel;
use yii\data\ActiveDataProvider;

class DefaultController extends Controller
{
	public static function defaultModelClass()
	{
		return ProductModel::className();
	}
	
	public function actionIndex()
	{
		
		$ModelSearch = new ProductModel();
		
		$dataProvider = new ActiveDataProvider([
			'query' => $ModelSearch::find(),
		]);
		
		
		return $this->render('index', [
			'ModelSearch' => $ModelSearch,
			'dataProvider' => $dataProvider,
		]);
		
	}
	
	
}
