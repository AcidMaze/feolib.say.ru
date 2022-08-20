<?php

    use yii\helpers\Html;
    $this->title = 'Ничего не найдено';
    use yii\helpers\Url;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" style = "margin-top:5rem;">
            <h2 style = "margin-top:5rem;">
                К сожалению по выбраной дате ничего не найденно
            </h2>
            <p class = 'p_style-4' style = "margin-bottom:15rem;">
                <a href="<?=Url::to(['content/events']);?>">Вернуться назад</a></li>
            </p>
        </div>
    </div>
</div>
