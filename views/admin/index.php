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
        <div class="col-md-6 my-auto">
            <img width = "425px" class="img-fluid float-right" src="/images/admin.svg" alt="Контакты">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-auto">
            <div class="float-left">
                <a class = "btn btn-info" href="<?=Url::to(['add']);?>">Добавить новое мероприятие</a>
                <a class = "btn btn-info" href="<?=Url::to(['userlist']);?>">Список пользователей</a>
            </div>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                'id',
                'columns' => [            
                    'label'=>'Фото 1',
                    'format' => 'image',    
                    'value' => function($dataProvider) {
                        return 'data:image/jpeg;charset=utf-8;base64,' . base64_encode($dataProvider->title_img1);
                    },  
                    'format' => ['image',['width'=>'250px','height'=>'150px']], 
                       
                ],
                'columns' => [            
                    'label'=>'Фото 1',
                    'format' => 'image',    
                    'value' => function($dataProvider) {
                        return 'data:image/jpeg;charset=utf-8;base64,' . base64_encode($dataProvider->title_img2);
                    },  
                    'format' => ['image',['width'=>'250px','height'=>'150px']], 
                       
                ],
                'title:ntext',
                'place:ntext',
                'date:ntext',
                'text:ntext',
                'status:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{update} {delete} {link}',
            ],
        ],
    ]); ?>
</div>
