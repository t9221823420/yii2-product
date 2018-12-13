<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

include __DIR__ . '/_header.php';

?>
<div class="<?= "$moduleId $modelId-$actionId" ?>">

    <h1><?= Html::encode( $this->title ) ?></h1>
	<?php Pjax::begin(); ?>
	<?php // echo $this->render('_search', ['Model' => $ModelSearch]); ?>

    <p>
		<?= Html::a( Yii::t( 'app', 'Create ') . $modelTitle, [ 'create' ], [ 'class' => 'btn btn-primary' ] ) ?>
    </p>
	
	<?= GridView::widget( [
		'dataProvider' => $dataProvider,
		//'filterModel' => $ModelSearch,
		'tableOptions' => [
			'class' => 'table table-striped table-hover',
		],
		
		'columns' => array_merge(
			method_exists( $Model, 'attributesIndexList' ) ? $Model->attributesIndexList() : array_keys( $Model->attributes ),
			[ [ 'class' => 'yii\grid\ActionColumn' ] ]
		),
		
		/*
		'columns' => [
				
				'id',
				'title',
				'rate',
				
				['class' => 'yii\grid\ActionColumn']
		],
		*/
	
	] ); ?>
	<?php Pjax::end(); ?>
</div>
