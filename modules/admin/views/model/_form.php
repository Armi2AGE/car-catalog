<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Brand;

/* @var $this yii\web\View */
/* @var $carModelForm app\modules\admin\forms\CarModelForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($carModelForm, 'brand_id')->hiddenInput(['value' => $brand->id])->label(false)?>

    <?= $form->field($carModelForm, 'name')->textInput() ?>

    <?= $form->field($carModelForm, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($carModelForm, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
