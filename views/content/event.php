<?php
/** @var yii\web\View $this */
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\widgets\LinkPager;
    use yii\bootstrap4\Carousel;
    $this->title = $event->title;
?>
<div class="container">
    <div class = "row">
        <div class="mt-5 col-lg-12 event-info-block">
            <div class="mx-auto col-md-6 event-info-img">
                <div class = 'cart-event-date-block'>
                    <p class = 'event-date-p badge badge-pill badge-date'><?=$event->date?></p>
                </div>
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
            <div class="mx-auto col-md-6">
                <p class = "pt-2 my-auto p_style-4">
                    <?=$event->title?>
                </p>
                <p class = "my-auto p_style-5">
                    <?=$event->place?>
                </p >
                <p class = "pt-2 my-auto p_style-6">
                    <?=$event->text?>
                </p >
            </div>
        </div>
    </div>
    <div class = "row">
        <?php
            $cookies = Yii::$app->request->cookies;
            if ($cookies->has('uniqueID')){
                echo "
                    <div class = 'mt-5 col-lg-12'>
                        <p id = 'showrevform' class = 'btn send-button float-right check-send'>Оставить отзыв</p>
                    </div>
                ";
            }
        ?>
        <div class = "col-lg-12 send-review-block">
                <div class = "pl-4 pt-4 col-lg-2">
                    <?php
                        $cookies = Yii::$app->request->cookies;
                        $base = Yii::$app->request->baseUrl;
                        $uniqueID = $cookies->getValue('uniqueID');
                        $userName = $_SESSION['user'][$uniqueID]['name'];
                        if($_SESSION['user'][$uniqueID]['img'] == null) $img = "$base/images/default_profile.png";
                        else $img = 'data:image/jpg;base64,'.base64_encode($_SESSION['user'][$uniqueID]['img']);
                        echo "
                            <div class = 'circle-image-user-2'>
                                <img src='$img'>
                            </div>
                            <div class ='pt-1'>
                                <p class = 'p_style-7'>$userName</p>
                            </div>
                        ";
                    ?>
                    <div class = 'user-pill-1'>
                        <div class="p-2">
                            <p class = "p_style-8">Пользователь</p>
                        </div>
                    </div>
                </div>
                <div class = "pt-4 col-lg-10">
                    <?php $form = ActiveForm::begin(['id' => 'review-form']); ?>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <?= $form->field($review_model, 'rev_text', ['template'=> "{input}"])->textArea(['type' => 'text', 'style' => 'border-radius: 5px; max-height: 450px', 'placeholder' => 'Введите текст отзывы', 'rows' => '8', 'class '=> 'form-control form-control-lg'])->label(false);?>
                            </div>
                            <div class="form-group col-md-12">
                                <?= Html::submitButton('Отправить',['class' => 'btn send-button float-right']) ?>
                            </div>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
        </div>                      
    </div>
    <div class = "row">
        <div class = "mt-4 col-lg-10">
            <h2>
                Отзывы наших гостей
            </h2>
        </div> 
    </div> 
    <div class = "row">
        <?php
            $base = Yii::$app->request->baseUrl;
            foreach ($models as $model) {
            
                if($model->Userimage == null)
                {
                    $img = "$base/images/default_profile.png";
                }
                else
                {
                    $img = 'data:image/jpg;base64,'.base64_encode($model->Userimage);
                }
                $userUrl = Url::to(['user/profile', 'id' => $model->id_user]);
                echo "
                    <div class = 'mt-2 col-lg-12 review-block'>
                        <div class = 'pl-3 pt-4 col-lg-2'>
                            <a href = '$userUrl'>
                                <div class = 'circle-image-user-2'>
                                    <img src='$img'>
                                </div>
                                <div class ='pt-1'>
                                    <p class = 'p_style-7'>$model->username</p>
                                </div>
                                <div class = 'user-pill-1'>
                                    <div class='p-2'>
                                        <p class = 'p_style-8'>Пользователь</p>
                                    </div>
                                </div>
                                <div class='pt-1'> 
                                    <p class = 'p_style-9'>Сообщений: $model->UserRevCount</p>
                                </div>
                            </a>
                        </div>
                        <div class = 'pt-4 pb-1 col-lg-10' style = 'border-radius: 15px; min-height: 190px; max-height: 550px; background: #F5F4F4;'>
                            <p class = 'my-auto p_style-10'>
                                $model->rev_text
                            </p>
                        </div>
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

