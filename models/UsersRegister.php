<?php
namespace app\models;
use yii\db\ActiveRecord;

class UsersRegister extends ActiveRecord {

    public $repeat_password;
    public $iaccept;
    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return 
        [
            [['name', 'login', 'password'], 'required', 'message' => 'Поле должно быть заполнено'],
            [['name'], 'string', 'max' => 64],
            ['login', 'unique', 'message' => 'Аккаунт с таким логином уже существует'],
            ['password', 'string', 'min'=>6, 'max'=>64],
            ['repeat_password', 'required', 'message' => 'Поле должно быть заполнено'],
            [['repeat_password'], 'string', 'min'=>6, 'max'=>64,],
            ['password', 'compare', 'compareAttribute'=>'repeat_password','message'=>"Пароли не совпадают"],
            ['iaccept', 'compare', 'compareValue' => 1, 'message' => 'Примите пользовательское соглашение'], 
        ];
    }

}