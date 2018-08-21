<?php

/* @var $this yii\web\View */

$this->title = 'Автомобили в лизинг';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Выбери свой автомобиль!</h1>

        <p class="lead">Условия лизинга которые обрадуют тебя!</p>

        <?php foreach ($brands as $brand): ?>
            <button type="button" class="btn btn-default"><?= $brand->name ?></button>
        <?php endforeach; ?>
    </div>

    <div class="body-content">
    </div>
</div>
