<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model{
    public $image;

    public function uploadFile(UploadedFile $file, $currentImage)
    {

        $this->image = $file;

        if(file_exists(Yii::getAlias('@web').'uploads/'.$currentImage) && $currentImage!=NULL) {
            unlink(Yii::getAlias('@web') . 'uploads/' . $currentImage);
        }
        $filename = strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);

        $file->saveAs(Yii::getAlias('@web').'uploads/'.$filename);

        return $filename;
    }
}

