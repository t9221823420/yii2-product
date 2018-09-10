<?php

use yii\helpers\Html;
use yii\helpers\Inflector;

if( !isset($Model) && isset($searchModel) ){
	$Model = $searchModel;
}

$_params_['moduleId'] = $moduleId = $this->context->module->id;

$_params_['actionId'] = $actionId = $this->context->action->id;
$_params_['actionTitle'] = $actionTitle = Yii::t( 'app', Inflector::camel2words( $this->context->action->id ));

$_params_['modelId'] = $modelId    = Inflector::camel2id( ( new\ReflectionObject( $Model ) )->getShortName() );
$_params_['modelTitle'] = $modelTitle = Yii::t( 'app', Inflector::camel2words( ( new\ReflectionObject( $Model ) )->getShortName() ));

$this->title                   = "$actionTitle: $modelTitle";

$this->params['breadcrumbs'][] = [ 'label' => $modelTitle, 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $actionTitle;

$path = '@yozh/product/views/default/';