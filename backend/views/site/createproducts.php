<?php

/** @var yii\web\View $this */

$this->title = 'Create Products';
?>

<div class="site-create-products">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>Use the form below to create a new product.</p>

    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group" style="margin-top: 15px;">
        <?= \yii\helpers\Html::submitButton('Create Product', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>