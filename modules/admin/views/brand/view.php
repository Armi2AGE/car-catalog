<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Панель управления', 'url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы точно хотите удалить этот бренд?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><?= $model->description ?></p>
        <h2>Перечень моделей</h2>
            <div class="panel-body">
                <?php foreach ($model->models as $carModel) : ?>
                    <a href="<?= Url::toRoute(['/admin/model/view', 'id' => $carModel->id]) ?>"
                            class="btn btn-default"><?=$carModel->name?></a>
                <?php endforeach; ?>
                <a href="<?= Url::toRoute(['/admin/model/create', 'brand_id' => $model->id])?>"
                        class="btn btn-success">+ Модель</a>
            </div>
    </div>

</div>
