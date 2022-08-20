<?php
/** @var yii\web\View $this */
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\widgets\LinkPager;
    use yii\bootstrap4\Carousel;
    $this->title = 'Мероприятия';
?>
<div class="container">
    <div class="row main-title-block">
        <div class="col-md-6 my-auto">
            <div class="float-left">
                <h1>
                    Наши<br>мероприятия
                </h1>
                <h2>
                    Нам важно каждое мнение
                </h2>
            </div>
        </div>
        <div class="col-md-6 my-auto">
            <img width = "425px" class="img-fluid float-right" src="/images/events.svg" alt="Контакты">
        </div>
    </div>
    <div class="row mt-4">
        <div class = "col-lg-8 mx-auto">
            <div class="container">
                <?php $form = ActiveForm::begin(['id' => 'search-form','options' => ['class' => 'card card-date']])?>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <label>От</label> 
                            <?= $form->field($search_model, 'fromDate')->textInput(['type' => 'text', 'value' => $search_model->fromDate, 'class'=>'form-control form-date'])->label(false); ?>
                        </div>
                        <div class="col-md-4 mx-auto">
                            <label>До</label> 
                            <?= $form->field($search_model, 'toDate')->textInput(['type' => 'text', 'value' => $search_model->toDate, 'class'=>'form-control form-date'])->label(false); ?>
                        </div>
                        <div class="col-md-4 mx-auto"><label>Поиск</label> 
                            <?= Html::submitButton('Найти', ['class' => 'btn btn-primary date-button w-100']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <?php
            foreach ($models as $model) {
                $img1 = base64_encode($model->title_img1);
                $img2 = base64_encode($model->title_img2);
                $url = Url::to(['event', 'id' => $model->id]);
                echo "
                    <div class='col-lg-4 mb-3'>
                        <a href = '$url' style = 'text-decoration: none;'>
                        
                            <div class = 'cart-event mx-auto'>
                                <div class='cart-event-img-1 mb-2' style = 'background-image: url(data:image/jpg;base64,$img1);'>
                                <div class = 'cart-event-date-block-2'>
                                    <p class = 'event-date-p badge badge-pill badge-date'>$model->date</p>
                                </div>   
                                <span>$model->title</span>
                                </div>
                                <div class='cart-event-img-2' style = 'background-image: url(data:image/jpg;base64,$img2);'></div>
                            </div>
                        </a>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="row mt-1">
        <div class="mx-auto">
            <h2>
                <?=  
                    LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                ?>
            </h2>
        </div>
    </div>
</div>

