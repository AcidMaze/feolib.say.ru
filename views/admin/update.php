<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
    $this->title = 'Добавить мероприятие';
?>
<div class="container mt-5 mb-5 col-lg-8">
    <?php $form = ActiveForm::begin(['id' => 'update_event-form','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Добавить мероприятие</h2>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'title')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->title,
                        'placeholder' => 'Название мероприятия', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'place')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->place,
                        'placeholder' => 'Место проведеления', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'text')->textArea(
                        ['type' => 'text', 
                        'value' => $model->text,
                        'style' => 'background-color: #ddfeed; border-radius: 5px; max-height: 450px', 
                        'placeholder' => 'Введите описание мероприятия', 'rows' => '8', 
                        'class '=> 'form-control form-control-lg'])->label(false);?>
                </div>   
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'status')->dropDownList(['1' => 'Актуальное', '2' => 'Завершенное'], ['class'=>'form-control form-control-lg','value' => $model->status])->label(false); ?>
                </div>  
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'date')->widget(DatePicker::className(),
                    [
                        'name' => 'check_issue_date',
                        'value' => date($model->date),
                        'options' => ['placeholder' => 'Укажите дату'],
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
            </div>
        </article>
    <?php ActiveForm::end(); ?>
</div>
