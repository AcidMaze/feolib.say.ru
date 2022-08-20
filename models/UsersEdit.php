<?php
namespace app\models;
use yii\db\ActiveRecord;

class UsersEdit extends ActiveRecord {

    public $userImgFile;
    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return 
        [
            [['name',  'email' ], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name', 'email'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 21],
            ['age_date', 'string'],
            ['sex', 'integer'],
            ['phone', 'unique', 'message' => 'Аккаунт с таким моб.номером уже существует'],
            ['email', 'unique', 'message' => 'Аккаунт с таким Email уже существует'],
            ['userImgFile', 'file', 'maxSize' => 2000000], 
        ];
    }

}