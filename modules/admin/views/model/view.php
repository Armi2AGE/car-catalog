<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = [
    'label' => $model->brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$model->brand->id])
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить эту модель?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= $model->description ?></p>
    </div>

</div>
