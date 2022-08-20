<?php
namespace app\models;
use yii\db\ActiveRecord;

class AddEventImages extends ActiveRecord
{

        public $imageList;
        public static function tableName()
        {
            return 'events_images'; // Имя таблицы в БД
        }
        public function rules() 
        {
            return 
            [
               
            ];
        }
}