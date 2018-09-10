<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($Model, 'id') ?>

    <?= $form->field($Model, '_deleted') ?>

    <?= $form->field($Model, 'begin') ?>

    <?= $form->field($Model, 'end') ?>

    <?= $form->field($Model, 'vehicle_id') ?>

    <?php // echo $form->field($Model, 'odometr') ?>

    <?php // echo $form->field($Model, 'project_id') ?>

    <?php // echo $form->field($Model, 'engineers') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t( 'app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t( 'app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
