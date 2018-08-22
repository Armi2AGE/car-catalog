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
                <button type="button" class="btn btn-default" data-type="brand" data-car-id="<?= $brand->id ?>">
                    <?= $brand->name ?></button>
            <?php endforeach; ?>

        </div>

        <h2 id="models-header" style="display: none;">Достпуные модели</h2>
        
    </div>

    <div id="models" class="row"></div>

    <div id="equipments"></div>
</div>

<?php

$script = <<< JS
    // Ajax request for models
    $('[data-type="brand"]').click(function() {
        var brandId = $(this).attr('data-car-id');
        $('#models').empty();
        
        $.ajax({
            url: '/model/index',
            type: 'POST',
            data: {
              brandId: brandId,
            },
            success: function (data) {
                $('#models-header').show();
                $('#models').append(data);
            }
        });
    });

    // // Ajax request for equipments
    // // $('[data-type="model"]').click(function() {
    // $('#models').on('click', 'button[data-type="model"]', function() {
    //     var modelId = $(this).attr('data-model-id');
    //     $('#equipments').empty();
    //    
    //     $.ajax({
    //         url: '/equipment/index',
    //         type: 'POST',
    //         data: {
    //           modelId: modelId,
    //         },
    //         success: function (data) {
    //           data.models.forEach((item) => {
    //             console.log(item.name);
    //           //   $('#models-header').show();
    //           //   $('#models').append('<button data-type="model" type="button" class="btn btn-default">' + item.name 
    //           //   +'</button>');
    //           });
    //         }
    //     });
    // });
JS;

$this->registerJs($script, $this::POS_READY);
?>
