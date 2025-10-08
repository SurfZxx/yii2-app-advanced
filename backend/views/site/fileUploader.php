<?php

/** @var yii\web\View $this */

$this->title = 'Upload File';
?>

<div class="site-file-uploader">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>Use the form below to upload a file.</p>

    <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group" style="margin-top: 15px;">
        <?= \yii\helpers\Html::submitButton('Upload File', ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

</div>

<div style="margin-top: 20%;">
    <h2>Uploaded Files</h2>
    <?php if (!empty($files)): ?>
        <ul>
            <?php foreach ($files as $file): ?>
                <li>
                    <?= \yii\helpers\Html::a($file, ['site/download-file', 'filename' => $file]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No files uploaded yet.</p>
<?php endif; ?>
</div>