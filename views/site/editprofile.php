<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\bootstrap4\Modal;
    $this->title = 'Редактирование профиля';
?>
<div class="container product_section_container">
    <!-- Breadcrumb -->
    <div class="row">   
        <div class="col">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?=Url::to(['/']);?>">Главная</a></li> 
                    <li><i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?=Url::to(['user-profile']);?>">Мой профиль</a></li> 
                    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?=Url::to(['editprofile']);?>">Редактирование профиля</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    <?php $form = ActiveForm::begin(['id' => 'edit_profile','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto" style="max-width: 450px;">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style = "height: 38px"> 
                        <i class="fa fa-user"></i> 
                    </span>
                </div>
                <?= $form->field($model, 'username')->textInput(['type' => 'text', 'placeholder' => 'ФИО', 'class'=>'form-control', 'style' => 'width: 360px'])->label(false); ?>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style = "height: 38px"> 
                        <i class="fa fa-phone"></i>
                    </span>
                </div>
                <?= $form->field($model, 'phone')->textInput(['type' => 'text', 'placeholder' => 'Номер телефона', 'class'=>'form-control', 'style' => 'width: 360px'])->label(false); ?>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style = "height: 38px"> 
                        <i class="fa fa-envelope-o"></i> 
                    </span>
                </div>
                <?= $form->field($model, 'email')->textInput(['type' => 'text', 'placeholder' => 'Email', 'class'=>'form-control', 'style' => 'width: 360px'])->label(false); ?>
            </div>   
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" style = "height: 38px"> 
                        <i class="fa fa-map-marker"></i> 
                    </span>
                </div>
                <?= $form->field($model, 'address')->textInput(['type' => 'text', 'placeholder' => 'Адресс', 'class'=>'form-control', 'style' => 'width: 366px'])->label(false); ?>
            </div>                            
            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </article>
    <?php ActiveForm::end(); ?>
</div>
