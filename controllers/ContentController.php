<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;
use app\models\EventsList;
use app\models\EventImage;
use app\models\EventReviewList;
use yii\helpers\Html;


class ContentController extends Controller
{
   
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionEvents()
    {
        $search_model = new EventsList();
        if($search_model->load(Yii::$app->request->post()) && $search_model->validate()) 
        {
            $query = EventsList::find()->where(['between', 'date', $search_model->fromDate, $search_model->toDate]);
            $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $models = $query->offset($pages->offset)->limit($pages->limit)->all();
            if($query->count() > 0){
                return $this->render('events', [
                    'models' => $models,
                    'pages' => $pages,
                    'search_model' => $search_model
                ]);
            }
            else{
                return $this->render('noresult');
            }
        }
        else
        {
            $query = EventsList::find();
            $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $models = $query->offset($pages->offset)->limit($pages->limit)->all();
            return $this->render('events', [
                'models' => $models,
                'pages' => $pages,
                'search_model' => $search_model
            ]);
        }
    }
    public function actionEvent()
    {
        $review_model = new EventReviewList();
        $id_evt = Yii::$app->request->get('id');
        if ($review_model->load(Yii::$app->request->post()) && $review_model->validate()) 
        {
            $cookies = Yii::$app->request->cookies;
            if ($cookies->has('uniqueID'))
            {
                $review_model->rev_text = $review_model->rev_text;
                $review_model->id_user = $cookies->getValue('uniqueID'); 
                $review_model->id_event = $id_evt; 
                $review_model->save();
                return $this->refresh();
            }
        } 
        else 
        {
            $qry = EventsList::find()->where('id = :id', [':id' => $id_evt])->one();
            $images = EventImage::find()->where('id_event = :id_event', [':id_event' => $id_evt])->all();
            if($images)
            {
                foreach($images as $one){
                    $imgevent = base64_encode($one->img);
                    $img_items [] =  
                    [
                        'content' => Html::tag('div', '', ['class' => 'event-info-img', 'style' => "background-image: url(data:image/jpg;base64,$imgevent);"]),
                        'caption' => '',
                        'options' => [],
                    ];
                }
            }
            else
            {
                $imgevent = base64_encode($qry->title_img1);
                $img_items [] =  
                [
                    'content' => Html::tag('div', '', ['class' => 'event-info-img', 'style' => "background-image: url(data:image/jpg;base64,$imgevent);"]),
                    'caption' => '',
                    'options' => [],
                ];
            }
            
            $rev_qry = EventReviewList::find()->where('id_event = :id', [':id' => $id_evt]); 
            $pages = new Pagination(['totalCount' => $rev_qry->count(),'pageSize' => 4, 'forcePageParam' => false, 'pageSizeParam' => false]);
            $models = $rev_qry->offset($pages->offset)->limit($pages->limit)->all();   
            if($rev_qry->count() > 0)
            {
                return $this->render('event', [
                    'models' => $models,
                    'pages' => $pages,
                    'event' => $qry,
                    'img_items' => $img_items,
                    'review_model' => $review_model
                ]);
            }
            else
            {
                return $this->render('event', [
                    'models' => $models,
                    'pages' => $pages,
                    'event' => $qry,
                    'img_items' => $img_items,
                    'review_model' => $review_model
                ]);
            }
        }
    }

    public function actionGallery()
    {
        foreach(EventImage::find()->all() as $one){
            $image = base64_encode($one->img);
            $img_items [] =  
            [
                'content' => Html::tag('div', '', ['class' => 'gallery-img',  'style' => "background-image: url(data:image/jpg;base64,$image);"]),
                'caption' => '',
                'options' => [],
            ];
        }
        return $this->render('gallery', [
            'img_items' => $img_items
        ]);
    }  
}
