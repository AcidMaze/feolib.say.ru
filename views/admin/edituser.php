<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
    $this->title = 'Редактировать пользователя';
?>

<div class="container mb-5 mt-5 col-lg-5">
    <?php $form = ActiveForm::begin(['id' => 'editprofile-form','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Редактировать профиль</h2>
            <form>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'name')->textInput(['style' => 'height: 40px', 'type' => 'text', 'placeholder' => 'ФИО', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-12 mx-auto col-lg-12">
                    <?= $form->field($model, 'sex')->dropDownList(['1' => 'Мужской', '2' => 'Женский'], ['value' => $model->sex, 'class'=>'form-control card-reg-form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'email')->textInput(['style' => 'height: 40px', 'type' => 'string', 'placeholder' => 'Email', 'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'phone')->textInput(['style' => 'height: 40px', 'type' => 'string', 'placeholder' => 'Моб. телефон' , 'class' => 'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'age_date')->widget(DatePicker::className(),
                        [
                            'name' => 'check_issue_date',
                            'value' => date($model->age_date),
                            'options' => ['placeholder' => 'Укажите дату рождения'],
                            'pluginOptions' => [
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ])->label(false); 
                    ?>
                </div> 
                <div class="form-group col-lg-12">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </form>
        </article>
    <?php ActiveForm::end(); ?>
</div>