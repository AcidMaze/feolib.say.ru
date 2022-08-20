<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\bootstrap4\Modal;
    $this->title = $user->name;
?>
<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <?php
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
                            ";
                            if($user->adminlvl > 0){
                                echo"
                                    <div style = 'width: 165px; height: 30px; background: #d72424;'>
                                        <div class='p-2'>
                                            <p class = 'p_style-8'>Администратор</p>
                                        </div>
                                    </div>
                                ";
                            }
                            else{
                                echo"
                                <div style = 'width: 135px; height: 30px; background: #44BAD3;'>
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
                        <div class="col-sm-3">
                            <h6 class="mb-0">ФИО</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$user->name?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Моб. телефон</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$user->phone?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Дата рождения</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <?=$user->age_date?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>