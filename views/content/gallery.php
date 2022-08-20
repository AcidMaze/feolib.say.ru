<?php

/** @var yii\web\View $this */
    $this->title = 'Мероприятия';
    use yii\bootstrap4\Carousel;
?>
<div class="container">
    <div class="row main-title-block">
        <div class="col-md-6 my-auto">
            <div class="float-left">
                <h1>
                    Галерея фотоснимков
                </h1>
                <h2>
                    Цени момент
                </h2>
            </div>
        </div>
        <div class="col-md-6 my-auto">
            <img width = "425px" class="img-fluid float-right" src="/images/gallery.svg" alt="Контакты">
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-12 mx-auto">
            <?php
                echo Carousel::widget([
                    'items' => $img_items,
                    'options' => ['class' => 'carousel slide', 'data-interval' => '2000'],
                    'controls' => [
                        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                    ]
                ]);
            ?>
        </div>
    </div>
</div>

