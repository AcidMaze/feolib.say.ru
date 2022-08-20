<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\grid\GridView;
    $this->title = 'Панель администратора';
?>
<div class="container mt-5 mb-5 col-lg-11">
    <div class="row main-title-block">
        <div class="col-md-6 my-auto">
            <div class="float-left">
                <h1 class = "h1_style-1">
                    Панель администратора
                </h1>
            </div>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name:ntext',
                'phone:ntext',
                'email:ntext',
                'age_date:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete} {link}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<i class="bi bi-pencil-fill"></i>', $url, [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="bi bi-trash"></i>', $url, [
                                    'title' => Yii::t('app', 'lead-delete'),
                        ]);
                    }
        
                  ],
                  'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === 'update') {
                        $url ='edituser?id='.$model->id;
                        return $url;
                    }
                    if ($action === 'delete') {
                        $url ='deleteuser?id='.$model->id;
                        return $url;
                    }
                  }
            ],
        ],
    ]); ?>
</div>
