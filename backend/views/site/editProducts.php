<?php

/** @var yii\web\View $this */

$this->title = 'Edit Products';
?>

<div class="site-edit-products">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>Use the form below to edit an existing product.</p>

    <?php $form = \yii\widgets\ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group" style="margin-top: 15px;">
        <?= \yii\helpers\Html::submitButton('Update Product', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>