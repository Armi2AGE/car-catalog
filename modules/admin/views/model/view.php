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
    'url' => Url::toRoute(['brand/view', 'id' => $model->brand->id])
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
        <?php if ($model->photo) : ?>
            <img src="/<?= $model->photo ?>" class="img-rounded">
        <?php endif; ?>
    </div>

    <h2 class="text-center" style="margin-bottom: 3rem;">Доступные модификации</h2>

    <div class="row">
        <?php foreach ($model->equipments as $equipment) : ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="caption">
                        <h3><?= $equipment->name ?></h3>
                        <p><?= $equipment->description ?></p>
                        <p>
                            <?= Html::a('Редактировать', ['/admin/equipment/update', 'id' => $equipment->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Удалить', ['/admin/equipment/delete', 'id' => $equipment->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Вы точно хотите удалить эту модификацию?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="col-sm-6 col-md-4">
                    <p>
                        <?= Html::a('+ Модификация', ['/admin/equipment/create', 'model_id' => $model->id], ['class' =>
                            'btn btn-success']) ?>

                    </p>
        </div>
    </div>

</div>
