<?php

/* @var $this yii\web\View */

$this->title = 'Автомобили в лизинг';
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">Условия лизинга которые обрадуют тебя!</p>
        
        <h1>Выбери свой автомобиль!</h1>

        <div id="brands">
            <?php foreach ($brands as $brand): ?>
                <button type="button" class="btn btn-default" data-car-id="<?= $brand->id ?>">
                    <?= $brand->name ?></button>
            <?php endforeach; ?>

        </div>

        <h2 id="models-header" style="display: none;">Достпуные модели</h2>
        
        <div id="models"></div>
    </div>

    <div class="body-content">
    </div>
</div>

<?php

$script = <<< JS
    $('.btn').click(function() {
        var brandId = $(this).attr('data-car-id');
        $('#models').empty();
        
        $.ajax({
            url: '/model/index',
            type: 'POST',
            data: {
              brandId: brandId,
            },
            success: function (data) {
              data.models.forEach((item) => {
                console.log(item.name);
                $('#models-header').show();
                $('#models').append('<button type="button" class="btn btn-default">' + item.name +'</button>');
                
              });
            }
        });
    });
JS;

$this->registerJs($script, $this::POS_READY);
?>
