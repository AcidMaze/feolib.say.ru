<?php
namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

class UsersLogin extends ActiveRecord {

    public static function tableName() {
        return 'users';
    }

    public function rules() {
        return 
        [
            [['login','password'],'required', 'message' => 'Поле должно быть заполнено'],
            [['login'], 'string', 'max' => 64],
            [['login','password'], 'string', 'max' => 64],
        ];
    }

}
