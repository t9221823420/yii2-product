<?php

use yii\helpers\Html;
use yozh\crud\components\ActiveForm;
use yozh\taxonomy\models\Taxonomy;
use kartik\tree\TreeViewInput;
use kartik\icons\Icon;
use yozh\product\AssetsBundle;

/* @var $this yii\web\View */
/* @var $model common\models\InvestPlan */
/* @var $form yii\widgets\ActiveForm */

$attributes = $model->attributes;

$rootNode = Taxonomy::find( [ 'name' => 'Category' ] )->one();

AssetsBundle::register( $this );
Icon::map($this, Icon::FA);
?>

<div class="invest-plan-form">
	
	<?php $form = ActiveForm::begin(); ?>
	
	<?php $fields = $form->fileds( $model,
		method_exists( $model, 'attributeEditList' )
			? $model->attributeEditList()
			: array_keys( $model->attributes ),
		false
	);
	
	//$rootNode = ( static::CLASSNAME )::find( [ 'name' => static::VOCABULARY_NAME ] )->one() )
	
	$fields['taxonomy_id'] = $form->field($model, 'taxonomy_id')->widget(TreeViewInput::classname(),[
		'query'          => Taxonomy::find()
		    ->where(['root' => $rootNode->root,])
		    ->andWhere(['<>', 'id', $rootNode->id ])
		    ,
		'headingOptions' => [ 'label' => Yii::t( 'app', 'Category' ) ],
		'rootOptions'    => [
		        'class' => 'hide',
        ],
		'fontAwesome'    => true,
		'multiple'       => false,
		
		'iconEditSettings' => [
		    'show' => 'none',
        ],
		//'options'        => [ 'disabled' => false ],
	] );;
	
	foreach( $fields as $field ) {
		print $field;
	}
	
	?>

    <div class="form-group">
		<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
    </div>
	
	<?php ActiveForm::end(); ?>

</div>