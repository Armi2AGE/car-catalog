<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = 'Добавить Бренд';
$this->params['breadcrumbs'][] = ['label' => 'Панель управления','url' => ['/admin']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
