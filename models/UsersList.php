<?php
namespace app\models;
use yii\db\ActiveRecord;

class UsersList extends ActiveRecord
{

      public static function tableName()
      {
            return 'users'; // Имя таблицы в БД
      }
      
      public function setUserInfo($user)
      {
            if(!isset($_SESSION['user'][$user->id]))
            {
                  $_SESSION['user'][$user->id] = [
                        'name' => $user->name,
                        'img' => $user->img,
                        'adminlvl' => $user->adminlvl,
                  ];
            }
      }
      public function isAdmin($user){
            
            if(isset($_SESSION['user'][$user]))
            {
                  if($_SESSION['user'][$user]['adminlvl'] == 1)
                  {
                        return true;
                  }
                  else 
                  {
                        return false;
                  }
            }

      }

      public function getAllUserId() {
            return $this->hasMany($this::className(), ['id' => 'id']);
      }
        
      public function getUserCount() { 
            return count($this->allUserId);
      }
      
}