<?php

use yii\helpers\Html;
use yozh\form\ActiveForm;
use yozh\taxonomy\models\Taxonomy;
use kartik\tree\TreeViewInput;
use kartik\icons\Icon;
use yozh\product\AssetBundle;
use yii\bootstrap\Tabs;
use yozh\properties\PropertiesWidget;

/* @var $this yii\web\View */
/* @var $Model common\models\InvestPlan */
/* @var $form yii\widgets\ActiveForm */

$attributes = $Model->attributes;

$rootNode = Taxonomy::find( [ 'name' => 'Category' ] )->one();

AssetBundle::register( $this );
Icon::map( $this, Icon::FA );
?>

<?php $form = ActiveForm::begin(); ?>

<?php ob_start(); ?>
<div class="form">
	
	<?php $fields = $form->fields( $Model,
		$Model instanceof \yozh\form\interfaces\AttributeActionListInterface
			? $Model->attributesEditList()
			: $Model->attributes(),
		[ 'print' => false, ]
	);
	
	//$rootNode = ( static::CLASSNAME )::find( [ 'name' => static::VOCABULARY_NAME ] )->one() )
	
	$fields['taxonomy_id'] = $form->field( $Model, 'taxonomy_id' )->widget( TreeViewInput::classname(), [
		'query'          => Taxonomy::find()
		                            ->where( [ 'root' => $rootNode->root, ] )
		                            ->andWhere( [ '<>', 'id', $rootNode->id ] )
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
	] )
	;;
	
	foreach( $fields as $field ) {
		print $field;
	}
	
	?>

    <div class="form-group">
		<?= Html::submitButton( Yii::t( 'app', 'Save' ), [ 'class' => 'btn btn-success' ] ) ?>
    </div>

</div>
<?php $formContent = ob_get_clean(); ?>

<?php ob_start(); ?>
<?= PropertiesWidget::widget( [
	'form' => $form,
	'ownerModel' => $Model,
] ); ?>
<?php $propetiesContent = ob_get_clean(); ?>

<?php if( $Model->isNewRecord ): ?>
	<?= $formContent; ?>

<?php else: ?>
	<?= Tabs::widget( [
		'items' => [
			[
				'label'   => Yii::t( 'product', 'Model' ),
				'content' => $formContent,
				//'active'  => true,
			],
			[
				'label'   => Yii::t( 'product', 'Properties' ),
				'content' => $propetiesContent,
				'active'  => true,
			],
		],
	] ); ?>

<?php endif; ?>

<?php ActiveForm::end(); ?>
