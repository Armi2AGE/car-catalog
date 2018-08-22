<?php

namespace app\modules\admin\forms;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Model as CarModel;

class CarModelForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $brand_id;
    public $name;
    public $description;
    public $imageFile;

    public function rules()
    {
        return [
            [['brand_id', 'name'], 'required'],
            [['brand_id'], 'integer'],
            [['name','description'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'brand_id' => 'Идентификатор Бренда',
            'name' => 'Название',
            'description' => 'Описание',
            'photo' => 'Изображение',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    // Save data from form to car model
    public function save()
    {
        $carModel = new CarModel();
        $carModel->brand_id = $this->brand_id;
        $carModel->name = $this->name;
        $carModel->description = $this->description;
        $carModel->photo = "/uploads/{$this->imageFile->name}";
        $carModel->save();
        // var_dump($this->imageFile->name);
        // die();
    }
}