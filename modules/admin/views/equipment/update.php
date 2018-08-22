<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = 'Добавить Модификацию';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления','url' => ['/admin']];
$this->params['breadcrumbs'][] = [
    'label' => $model->model->brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$model->model->brand->id])
];
$this->params['breadcrumbs'][] = [
    'label' => $model->model->name,
    'url' => Url::toRoute(['model/view', 'id' =>$model->model->id])
];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'brand' => $brand,
    ]) ?>

</div>
