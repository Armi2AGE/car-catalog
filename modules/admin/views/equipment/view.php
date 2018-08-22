<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = [
    'label' => $model->model->brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$model->model->brand->id])
];
$this->params['breadcrumbs'][] = [
    'label' => $model->model->name,
    'url' => Url::toRoute(['model/view', 'id' =>$model->model->id])
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-view">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= $model->description ?></p>
    </div>

</div>
