<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Model */

$this->title = 'Update Model: ' . $model->name;
$this->params['breadcrumbs'][] = [
    'label' => $brand->name,
    'url' => Url::toRoute(['brand/view', 'id' =>$brand->id])
];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'brand' => $brand
    ]) ?>

</div>
