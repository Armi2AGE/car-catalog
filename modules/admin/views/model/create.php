<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = 'Добавить Модель';
$this->params['breadcrumbs'][] = [
    'label' => $brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$brand->id])
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'carModelForm' => $carModelForm,
        'brand' => $brand
    ]) ?>

</div>
