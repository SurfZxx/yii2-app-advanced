<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public $id;
    public $name;
    public $description;
    public $price;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price'], 'required'],
            ['price', 'number'],
            ['name', 'string', 'max' => 255],
            ['description', 'string'],
        ];
    }

    
}