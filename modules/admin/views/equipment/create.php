<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = 'Добавить Модификацию';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления','url' => ['/admin']];
$this->params['breadcrumbs'][] = [
    'label' => $carModel->brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$carModel->brand->id])
];
$this->params['breadcrumbs'][] = [
    'label' => $carModel->name,
    'url' => Url::toRoute(['model/view', 'id' =>$carModel->id])
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'carModel' => $carModel
    ]) ?>

</div>
