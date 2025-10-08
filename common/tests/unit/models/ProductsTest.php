<?php
namespace common\tests\unit\models;

use common\fixtures\ProductFixture;

class ProductsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    public function _fixtures()
    {
        return [
            'products' => [
                'class' => ProductFixture::class,
                'dataFile' => codecept_data_dir() . 'products.php',
            ],
        ];
    }
}