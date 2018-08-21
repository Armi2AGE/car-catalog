<?php

use yii\helpers\Url;

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-default-index">
    <div class="jumbotron">
        <h1>Панель управления</h1>
        <h2>Наши бренды</h2>
        <div class="panel-body">
            <?php foreach ($brands as $brand) : ?>
                <a href="<?= Url::toRoute(['/admin/brand/view', 'id' => $brand->id]) ?>"
                        class="btn btn-default"><?= $brand->name ?></a>
            <?php endforeach; ?>
            <a href="<?= Url::toRoute(['/admin/brand/create'])?>" class="btn btn-success">+ Бренд</a>
        </div>
    </div>
</div>
