<?php

namespace app\models;

use Yii;
use app\components\ImageFileBehavior;

/**
 * This is the model class for table "model".
 *
 * @property int $id
 * @property int $brand_id
 * @property int $name
 * @property string $description
 * @property string $photo
 *
 * @property Brand $brand
 * @property Equipment[] $equipment
 */
class Model extends \yii\db\ActiveRecord
{

    // Add bevavior for handle image file
    public function behaviors()
    {
        return [
            'imageFile' => [
                'class' => ImageFileBehavior::className(),
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'name'], 'required'],
            [['brand_id'], 'integer'],
            [['name','description'], 'string'],
            [['photo'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::className(), ['model_id' => 'id']);
    }


    // /**
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getModels()
    // {
    //     return $this->hasMany(Model::className(), ['brand_id' => 'id']);
    // }

}
