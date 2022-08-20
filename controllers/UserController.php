<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\Cookie;
use app\models\UsersRegister;
use app\models\UsersLogin;
use app\models\UsersList;
use app\models\UsersEdit;

class UserController extends Controller
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
    //Регистрация
    public function actionSignup() {
        
        $model = new UsersRegister();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) 
        {
            $model->name = $model->name;
            $model->login = $model->login; 
            $model->password = $model->password; 
            $model->save();
            return $this->redirect(['signin']);
        } 
        else 
        {
            return $this->render('signup', ['model' => $model]);
        }
    }
    //Авторизация
    public function actionSignin() {
        $model = new UsersLogin();
        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model = UsersLogin::find()->where('login = :login AND password = :password', [':login' => $model->login,':password' => $model->password])->one();
            $cookies = Yii::$app->request->cookies;
            if (!$cookies->has('uniqueID')) {
                $cookies = Yii::$app->response->cookies;
                $cookies->add(new Cookie(
                    [
                        'name' => 'uniqueID',
                        'value' => $model->id,
                    ]
                ));
                $session = Yii::$app->session;
                $session->open();
                $users = new UsersList;
                $users->setUserInfo($model);
                return $this->redirect(['user-profile']);
            } 
            else {
                $value = $cookies->get('uniqueID');
            }
        } 
        else {
            return $this->render('signin', ['model' => $model]);
        }
    }
    //Выход пользователя
    public function actionSignout(){
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID')){
            $cookies = Yii::$app->response->cookies;
            $cookies->remove('uniqueID');
            $session = Yii::$app->session;
            if ($session->isActive)
            {
                $session->remove('user');
            }
            return $this->redirect(['/']);
        }
        else{
            return $this->redirect(['signin']);
        }
    }

    //Профиль
    public function actionUserProfile()
    {
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID')){
            $uniqueID = $cookies->getValue('uniqueID');
            $user = UsersList::find()->where('id = :id', [':id' => $uniqueID])->one();
            return $this->render('user-profile',
            [
                'user' => $user
            ]);
        }
        else{
            return $this->redirect(['signin']);
        }
    }
    //Редактированеи профиля
    public function actionEditprofile() {
        
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID'))
        {
            $uniqueID = $cookies->getValue('uniqueID');
            $model = UsersEdit::find()->where('id = :id', [':id' => $uniqueID])->one();
            if($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->name = $model->name;
                $model->phone = $model->phone;
                $model->age_date = $model->age_date;
                $model->email = $model->email;
                $model->sex = $model->sex;
                $model->save();
                return $this->redirect(['user-profile']);
            }
            else 
            {
                return $this->render('editprofile', ['model' => $model]);
            }
        }
    }  

    public function actionChangeimg() {
        
        $cookies = Yii::$app->request->cookies;
        if ($cookies->has('uniqueID'))
        {
            $uniqueID = $cookies->getValue('uniqueID');
            $model = UsersEdit::find()->where('id = :id', [':id' => $uniqueID])->one();
            if($model->load(Yii::$app->request->post()) && $model->validate()) {
                $file = \yii\web\UploadedFile::getInstance($model, 'userImgFile');
                if(!empty($file))
                {
                    $fp = fopen($file->tempName, 'r');
                    $file = fread($fp, $file->size);
                    fclose($fp);
                    $model->img = $file;
                    $model->save();
                    return $this->redirect(['user-profile']);
                }
                else{
                    return $this->redirect(['user-profile']);
                }
            }
            else 
            {
                return $this->render('changeimg', ['model' => $model]);
            }
        }
    }  
    
    public function actionProfile()
    {
        $id_user = Yii::$app->request->get('id');
        $qry = UsersList::find()->where('id = :id', [':id' => $id_user])->one();
        return $this->render('profile', [
            'user' => $qry,
        ]);
    }
}
