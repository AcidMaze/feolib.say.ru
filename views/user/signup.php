<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    $this->title = 'Регистрация пользователя';
?>
<div class="container mb-5 mt-5  col-lg-5">
    <?php $form = ActiveForm::begin(['id' => 'signup-form','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Регистрация</h2>
            <form>
                <div class="form-group col-md-12">
                    <?= $form->field($model, 'name')->textInput(['style' => 'height: 40px', 'type' => 'text', 'placeholder' => 'ФИО', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-md-12">
                    <?= $form->field($model, 'login')->textInput(['style' => 'height: 40px', 'type' => 'text', 'placeholder' => 'Логин', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-md-12">
                    <?= $form->field($model, 'email')->textInput(['style' => 'height: 40px', 'type' => 'text', 'placeholder' => 'Электронная почта', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-md-12">
                    <?= $form->field($model, 'password')->textInput(['style' => 'height: 40px', 'type' => 'password', 'placeholder' => 'Пароль', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'repeat_password')->textInput(['style' => 'height: 40px', 'type' => 'password', 'placeholder' => 'Повторите пароль', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= Html::submitButton('Создать', ['class' => 'btn btn-info btn-block']) ?>
                </div>
                <p class="text-center">У вас уже есть аккаунт? <a href="<?=Url::to(['signin']);?>">Авторизация</a></p> 
            </form>
        </article>
    <?php ActiveForm::end(); ?>
</div>

