<?php

    /** @var yii\web\View $this */
    /** @var string $content */
    use app\assets\AppAsset;
    use yii\bootstrap4\Html;
    use yii\helpers\Url;
    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
    <div class="head-container">
        <ul class = "col-lg-12 text-right">
            <li class="account">
                <?php
                    $cookies = Yii::$app->request->cookies;                    
                    if (!$cookies->has('uniqueID'))
                    {
                        $url = Url::to(['user/signin']);
                        $url2 = Url::to(['user/signup']);
                        echo"
                            <p>
                                Аккаунт
                                <i class='bi bi-chevron-down'></i>
                            </p>
                            <ul class='account_selection'>
                                <li><a href='$url'><i class='bi bi-box-arrow-in-right'></i>Авторизация</a></li>
                                <li><a href='$url2'><i class='bi bi-person-plus-fill'></i>Регистрация</a></li>
                            </ul>
                        ";
                    }
                    else
                    {
                        $userID = $cookies->getValue('uniqueID');
                        $userName = $_SESSION['user'][$userID]['name'];
                        $url = Url::to(['user/signout']);
                        $url2 = Url::to(['user/user-profile']);
                        echo"
                            <p>
                                <i class='bi bi-person-circle'></i>
                                $userName
                                <i class='bi bi-chevron-down'></i>
                            </p>
                            <ul class='account_selection'>
                                <li><a href='$url2'><i class='bi bi-person-circle'></i>Мой профиль</a></li>
                                <li><a href='$url'><i class='bi bi-box-arrow-left'></i>Выйти</a></li>
                            </ul>
                        ";
                    }
                ?>
            </li>
        </ul>
    </div>
    <nav class = "nav-container col-lg-12">
        <img width = "40" id = "m_menu" src = "/images/hambuger.svg" class="mobile-menu hamburger"/>
        <ul class = "nav-options">
            <li><a href="<?=Url::to(['/']);?>">Главная</a></li>
            <li><a href="<?=Url::to(['content/events']);?>">Мероприятия</a></li>
            <li><a href="<?=Url::to(['content/gallery']);?>">Галерея</a></li>
            <li><a href="<?=Url::to(['site/contacts']);?>">Контакты</a></li>
        </ul>
    </nav>
</header>
<main role="main" class="flex-shrink-0">
    <?= $content ?>
</main>

<footer class="text-center mt-3 text-lg-start text-muted">
  <div class="text-center p-4" style="background-color: #2DA0B9; color: #FFFFFF;">
    © 2022 Все права защищены
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
