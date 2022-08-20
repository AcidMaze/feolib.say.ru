<?php
namespace app\models;
use yii\db\ActiveRecord;

class UpdateEvent extends ActiveRecord
{
    public static function tableName()
    {
        return 'events_list'; 
    }
    public function rules() 
    {
        return 
        [
            [['title','place', 'text','date'],  'required', 'message' => 'Обязательно к заполнению'],
            ['date', 'string'],
            ['status', 'integer'],
            ['status',  'required', 'message' => 'Обязательно к заполнению'],
            ['title', 'string', 'min'=>3, 'max'=>128],
            ['place', 'string', 'min'=>3, 'max'=>128],
            ['text', 'string', 'min'=>3, 'max'=>2048],               
        ];
    }
}
