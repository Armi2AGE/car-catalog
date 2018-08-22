<?php

namespace app\components;

use Yii;
use yii\base\Behavior;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class ImageFileBehavior extends Behavior
{

    public $imageFile;

    public $path;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'delete'
        ];
    }

    public function upload()
    {
        if ( $this->owner->validate()) {
            // Generate unique file name
            $this->path = 'uploads/' . $this->owner->imageFile->baseName . '-' .
                Yii::$app->getSecurity()->generateRandomString(10) . '.' .
                $this->owner->imageFile->extension;
            
            $this->owner->imageFile->saveAs($this->path);
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $this->path = $this->owner->photo;

        unlink(Yii::$app->basePath . '/web/' . $this->path);
        
    }

}