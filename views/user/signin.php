<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    $this->title = 'Авторизация';
?>
<div class="container mt-5 mb-5 col-lg-3">
    <?php $form = ActiveForm::begin(['id' => 'signin-form','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Авторизация</h2>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'login')->textInput(['style' => 'height: 40px', 'type' => 'text', 'placeholder' => 'Логин', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'password')->textInput(['style' => 'height: 40px', 'type' => 'password', 'placeholder' => 'Пароль', 'class'=>'form-control'])->label(false); ?>
                </div>                               
                <div class="form-group col-lg-12">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-info btn-block']) ?>
                </div>
            </div>
        </article>
    <?php ActiveForm::end(); ?>
</div>
