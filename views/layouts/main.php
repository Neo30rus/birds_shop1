<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\App2Asset;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

App2Asset::register($this);
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
<?php

$items = [
    ['label' => 'Главная', 'url' => ['/site/index']],
    ['label' => 'О нас', 'url' => ['/site/about']],
    ['label' => 'Экзотические Птицы', 'url' => ['/shop/birds']],
    ['label' => 'Товары', 'url' => ['/shop/product']],
];
if (Yii::$app->user->isGuest) {
    $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];
    $items[] = ['label' => 'Регистрация', 'url' => ['/site/registration']];
} else {
    if (Yii::$app->user->can('admin')) {
        $items[] = [
            'label' => 'Справочники',
            'items' => [
                ['label' => 'Цвета птиц', 'url' => ['/bird-color']],
                ['label' => 'Виды птиц', 'url' => ['/bird-type']],
                ['label' => 'Семейство', 'url' => ['/bird-family']],
                ['label' => 'Виды продуктов', 'url' => ['/types']],
            ],
            'options' => [
                'class' => 'drop-list',
            ]
        ];
    }
    $items[] = ['label' => 'Корзина', 'url' => ['/shop/cart']];
    $items[] = '<li class = "nav-item">'
        . HTml::beginForm(['/site/logout'])
        . Html::submitButton(
            'Выход(' . Yii::$app->user->identity->email . ')',
            ['class' => 'nav-link btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
$nav= Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => $items
]);


?>
<header class="header-area header-default" data-bg-img="/assets-page/img/photos/header-bg.webp">
    <div class="container">
        <div class="row no-gutter align-items-center position-relative">
            <div class="col-12">
                <div class="header-align">
                    <div class="header-align-start">
                        <div class="header-logo-area">
                            <a href="/site/index">
                                <img class="logo-main" src="/assets-page/img/logo-light.webp" alt="Logo"/>
                            </a>
                        </div>
                    </div>
                    <div class="header-align-center">
                        <div class="header-navigation-area position-relative">
                            <ul class="main-menu nav">
                                <li><a href="/site/about"><span>О нас</span></a></li>
                                <li><a href="/shop/birds"><span>Экзотические птицы</span></a></li>
                                <li><a href="/shop/product"><span>Товары</span></a></li>
                                <?php if(Yii::$app->user->can('admin')):?>

                                <li class="has-submenu"><a href="#/"><span>Справочники</span></a>
                                    <ul class="submenu-nav">
                                        <li><a href="/bird-color"><span>Цвета птиц</span></a></li>
                                        <li><a href="/bird-type"><span>Виды птиц</span></a></li>
                                        <li><a href="/bird-family"><span>Семейство</span></a></li>
                                        <li><a href="/types"><span>Виды продуктов</span></a></li>
                                    </ul>
                                </li>
                                <?php endif;?>
                                <?php if(Yii::$app->user->isGuest):?>
                                    <li><a href="/site/login"><span>Авторизация</span></a></li>
                                    <li><a href="/site/register"><span>Регистрация</span></a></li>
                                <?php else:?>
                                    <li><a href="/shop/cart"><span>Корзина</span></a></li>
                                    <li><a href="/site/logout"><span>Выход</span></a></li>
                                <?php endif;?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer-area">
    <!--== Start Footer Main ==-->
    <div class="footer-main">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="widget-item widget-about">
                        <h4 class="widget-title">About Us</h4>
                        <p class="desc">Lorem ipsum dolor sit amet, consectel adipisicing elit, sed do eiusmod temp incidid ut labore et dolo</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                            <a href="https://dribbble.com/" target="_blank" rel="noopener"><i class="fa fa-dribbble"></i></a>
                            <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                            <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-item nav-menu-item1">
                        <h4 class="widget-title">Information</h4>
                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-1">Information</h4>
                        <div id="widgetId-1" class="collapse widget-collapse-body">
                            <div class="collapse-body">
                                <div class="widget-menu-wrap">
                                    <ul class="nav-menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="account-login.html">Delivery Information</a></li>
                                        <li><a href="account-login.html">Privacy Policy</a></li>
                                        <li><a href="account-login.html">Terms & Conditions</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="account-login.html">Loag In Info</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-item nav-menu-item2">
                        <h4 class="widget-title">Our Policy</h4>
                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-2">Our Policy</h4>
                        <div id="widgetId-2" class="collapse widget-collapse-body">
                            <div class="collapse-body">
                                <div class="widget-menu-wrap">
                                    <ul class="nav-menu">
                                        <li><a href="account-login.html">Gallery</a></li>
                                        <li><a href="shop.html">Brands</a></li>
                                        <li><a href="account-login.html">Gift Certificates</a></li>
                                        <li><a href="shop.html">Specials</a></li>
                                        <li><a href="account.html">My Account Us</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-item">
                        <h4 class="widget-title">Contact Info:</h4>
                        <h4 class="widget-collapsed-title collapsed" data-bs-toggle="collapse" data-bs-target="#widgetId-3">Contact Info:</h4>
                        <div id="widgetId-3" class="collapse widget-collapse-body">
                            <div class="collapse-body">
                                <div class="widget-contact-info">
                                    <p class="contact-info-desc">If you have any question.please contact us at <a href="mailto://demo@example.com">demo@example.com</a></p>
                                    <div class="contact-item">
                                        <div class="icon">
                                            <i class="pe-7s-map-marker"></i>
                                        </div>
                                        <div class="info">
                                            <p>Your address goes here. <br>123, Address.</p>
                                        </div>
                                    </div>
                                    <div class="contact-item phone-info">
                                        <div class="icon">
                                            <i class="pe-7s-phone"></i>
                                        </div>
                                        <div class="info">
                                            <p><span>Have any Question</span> <br><a href="tel://0123456789">+0 123 456 789</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-content">
                        <p class="copyright">© 2021 Tuime. Made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://themeforest.net/user/codecarnival">Codecarnival.</a></p>
                        <div class="payment">
                            <a href="account.html"><img src="/assets-page/img/photos/payment.webp" width="192" height="21" alt="Payment Logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Footer Bottom ==-->
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
