<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\bootstrap4\Modal;
    use kartik\date\DatePicker;
    $this->title = 'Изменить изображение профиля';
?>


<div class="container mt-5 col-lg-8">
    <?php $form = ActiveForm::begin(['id' => 'changeimg-form', 'options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Изменить фото</h2>
            <div class="col-lg-12">
                <?= $form->field($model, 'userImgFile')->fileInput(['style' => 'font-size:13px;','accept' => 'image/png,image/jpeg'])->label(false); ?>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-info']) ?>
            </div>
        </article>
    <?php ActiveForm::end(); ?>
</div>
