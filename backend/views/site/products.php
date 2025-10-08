<?php

/** @var yii\web\View $this */

$this->title = 'Product List';
?>

<div class="site-product-list">
    <h1><?= \yii\helpers\Html::encode($this->title) ?></h1>

    <p>Here you can manage your products.</p>

    <div>
        <button class="btn btn-success" onclick="location.href='<?= \yii\helpers\Url::to(['site/create-product']) ?>'">Create Product</button>
        
    </div>

    <table class="table table-striped" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $products = Yii::$app->db->createCommand('SELECT * FROM products')
                ->queryAll();
            foreach ($products as $product): ?>
                <tr>
                    <td><?= \yii\helpers\Html::encode($product['id']) ?></td>
                    <td><?= \yii\helpers\Html::encode($product['name']) ?></td>
                    <td><?= \yii\helpers\Html::encode($product['description']) ?></td>
                    <td><?= \yii\helpers\Html::encode($product['price']) ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['site/edit-product', 'id' => $product['id']]) ?>">Edit</a>
                        <a class="btn btn-danger" href="<?= \yii\helpers\Url::to(['site/delete-product', 'id' => $product['id']]) ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a class="btn btn-secondary" href="<?= \yii\helpers\Url::to(['site/index']) ?>">Back to Home</a>

</div>