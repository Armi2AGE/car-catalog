<?php

namespace app\modules\admin\forms;

use app\components\ImageFileBehavior;
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

    public function behaviors()
    {
        return [
            'imageFile' => [
                'class' => ImageFileBehavior::className(),
            ]
        ];
    }

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

    // Save data from form to car model
    public function save()
    {
        $carModel = new CarModel();
        $carModel->brand_id = $this->brand_id;
        $carModel->name = $this->name;
        $carModel->description = $this->description;
        // $carModel->photo = "/uploads/{$this->imageFile->name}";
        $carModel->photo = "{$this->path}";
        $carModel->save();
    }
}