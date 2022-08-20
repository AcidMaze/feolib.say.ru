<?php
namespace app\models;
use yii\db\ActiveRecord;

class AddEvent extends ActiveRecord
{

    public $imageFile;
    public $imageFile2;
    public static function tableName()
    {
        return 'events_list'; // Имя таблицы в БД
    }
    public function rules() 
    {
        return 
        [
            [['title','place', 'text', 'date'],  'required', 'message' => 'Обязательно к заполнению'],
            ['date', 'string'],
            ['status', 'integer'],
            ['status',  'required', 'message' => 'Обязательно к заполнению'],
            ['title', 'string', 'min'=>3, 'max'=>128],
            ['place', 'string', 'min'=>3, 'max'=>128],
            ['place', 'string', 'min'=>3, 'max'=>2048],
            ['imageFile', 'file', 'maxSize' => 2000000],                 
            ['imageFile2', 'file', 'maxSize' => 2000000],  
        ];
    }
}
