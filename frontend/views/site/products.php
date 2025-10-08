<?php
use yii\helpers\Html;
/** @var yii\web\View $this */

$this->title = 'Product List';
?>

<div class="site-product-list">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>Here you can manage your products.</p>

    <div>
        <p>
            create a product
        </p>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= \yii\helpers\Html::encode($product->id) ?></td>
                    <td><?= \yii\helpers\Html::encode($product->name) ?></td>
                    <td><?= \yii\helpers\Html::encode($product->description) ?></td>
                    <td><?= \yii\helpers\Html::encode($product->price) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>