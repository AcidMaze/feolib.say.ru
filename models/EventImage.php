<?php
namespace app\models;
use yii\db\ActiveRecord;

class EventImage extends ActiveRecord
{
      public static function tableName()
      {
            return 'event_img'; // Имя таблицы в БД
      }
}