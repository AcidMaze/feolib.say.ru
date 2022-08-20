<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\bootstrap4\Modal;
    $this->title = 'Мой профиль';
?>
<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <?php
                            $base = Yii::$app->request->baseUrl;
                            if($user->email == null) $address = "Укажите адресс электронной почты";
                            else $email = $user->email;
                            if($user->age_date == null) $age_date = "Укажите дату рождения";
                            else $age_date = $user->age_date;
                            if($user->sex == 1) $sex = "Мужской";
                            else $sex = "Женский";
                            $changeImg = Url::to(['changeimg']);
                            $base = Yii::$app->request->baseUrl;
                            if($user->img == null)
                            {
                                $img = "$base/images/default_profile.png";
                            }
                            else
                            {
                                $img = 'data:image/jpg;base64,'.base64_encode($user->img);
                            }
                            echo "
                                <div class = 'circle-image-user'>
                                    <img src='$img'>
                                </div>
                                <div class = 'mt-3'>
                                    <p class = 'p_style-1'>$user->name</p>
                                </div>
                                <div class='col-md-12 'mt-3' >
                                    <a class = 'btn btn-info' href = '$changeImg'>Изменить фотографию</a>
                                </div>
                            ";
                            if($user->adminlvl > 0){
                                echo"
                                    <div class = 'user-pill-2 mt-2'>
                                        <div class='p-2'>
                                            <p class = 'p_style-8'>Администратор</p>
                                        </div>
                                    </div>
                                ";
                            }
                            else{
                                echo"
                                <div class = 'user-pill-1 mt-2'>
                                    <div class='p-2'>
                                        <p class = 'p_style-8'>Пользователь</p>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0 p_style-10">ФИО</p>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <?=$user->name?>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0 p_style-10">Пол</p>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$sex?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0 p_style-10">Моб. телефон</p>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <?=$user->phone?>
                        </div>
                        <div class="col-md-2">
                            <p class="mb-0 p_style-10">Email</p>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$user->email?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb-0 p_style-10">Дата рождения</p>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$user->age_date?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-info" href="<?=Url::to(['editprofile']);?>">Редактировать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>