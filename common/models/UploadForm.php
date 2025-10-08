<?php
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt, png, jpeg, pdf'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {

            
            $timestamp = date('Ymd_His');
            $basename = pathinfo($this->file->name, PATHINFO_FILENAME);
            $extension = pathinfo($this->file->name, PATHINFO_EXTENSION);
            $namefile = $basename. "_" . $timestamp . rand(1, getrandmax()) . "." . $extension;


            $this->file->saveAs('@common/uploads/' . $namefile);
            return true;
        } else {
            return false;
        }
    }
}