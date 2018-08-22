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
    public $id;
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
            [['id','brand_id'], 'integer'],
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
        if (!CarModel::findOne($this->id)) {
            $carModel = new CarModel();
        } else {
            $carModel = CarModel::findOne($this->id);
        }
        $carModel->brand_id = $this->brand_id;
        $carModel->name = $this->name;
        $carModel->description = $this->description;
        $carModel->photo = "{$this->path}";
        $carModel->save();
    }
}