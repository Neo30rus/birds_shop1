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
                            <a href="/">
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
                                    <li><a href="/site/registration"><span>Регистрация</span></a></li>
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
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer-area">
    <!--== Start Footer Main ==-->

    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-content">
                        <p class="copyright">© 2024 ПИН. С ЛЮБОВЬЮ К ШКОЛЕ ОБЛАЧНЫХ ТЕХНОЛОГИЙ <i class="fa fa-heart"></i> </p>
                        <div class="payment">

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
