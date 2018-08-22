<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="row">
    <?php foreach ($models as $model) : ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src="/<?= $model->photo ?>" alt="...">
            <div class="caption">
                <h3><?= $model->name ?></h3>
                <p><?= $model->description ?></p>
                <p><a href="#" class="btn btn-default" role="button">Подробнее</a></p>
            </div>
            <ul class="list-group">
            <?php foreach ($model->equipments as $equipment) : ?>
                <li class="list-group-item"><?= $equipment->name ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>
</div>


