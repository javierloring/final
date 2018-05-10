<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InmueblesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inmuebles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'id') ?>

    <?= $form->field($model, 'precio') ?>

    <?= $form->field($model, 'num_hab') ?>

    <?= $form->field($model, 'num_banos') ?>

    <?= $form->field($model, 'lavavajillas')->checkbox() ?>

    <?= $form->field($model, 'garaje')->checkbox() ?>

    <?= $form->field($model, 'trastero')->checkbox() ?>

    <?php // echo $form->field($model, 'propietario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
