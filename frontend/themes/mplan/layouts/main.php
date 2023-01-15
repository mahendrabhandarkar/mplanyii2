<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
	<?php $this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php']);?>
	<?php $this->registerMetaTag(['name' => 'description', 'content' => 'This is my cool website made with Yii!'], 'description'); ?>
	<?php $this->registerLinkTag([
		'title' => 'Live News for Yii',
		'rel' => 'alternate',
		'type' => 'application/rss+xml',
		'href' => 'http://www.yiiframework.com/rss.xml/',
	]);
	?>
	<meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-Frame-Options" content="deny">
	<meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline' 'unsafe-eval'; report-uri: <?= 'https://'.$_SERVER['SERVER_NAME']; ?>;">
	<meta http-equiv="X-XSS-Protection" content="1; mode=block" />
	<meta http-equiv="Strict-Transport-Security" content="max-age=31536000" />
	<meta name="Referrer-Policy" value="no-referrer | same-origin" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
		$menuItems[] = [
				'label' => Yii::t('app', 'My Profile'),
				'items' => [
					['label' => Yii::t('app', 'Basic Information'), 'url' => ['/users/basicinfo']],
					['label' => Yii::t('app', 'Update Profile'), 'url' => ['/users/update-profile']],
					['label' => Yii::t('app', 'Account Setting'), 'url' => ['/users/account-setting']],
				],
			];
		$menuItems[] = [
				'label' => Yii::t('app', 'Required'),
				'items' => [
					['label' => Yii::t('app', 'Partner Basic Information'), 'url' => ['/partner/basicinfo']],
					['label' => Yii::t('app', 'Partner Education'), 'url' => ['/partner/education']],
					['label' => Yii::t('app', 'Partner Background'), 'url' => ['/partner/background']],
				],
			];
		$menuItems[] = [
				'label' => Yii::t('app', 'Matches'),
				'items' => [
					['label' => Yii::t('app', 'All Profile'), 'url' => ['/partner/matches']],
					['label' => Yii::t('app', 'Desired Partner'), 'url' => ['/partner/desired-partner']],
				],
			];
		$menuItems[] = [
				'label' => Yii::t('app', 'Message'),
				'items' => [
					['label' => Yii::t('app', 'Inbox'), 'url' => ['/message/inbox']],
					['label' => Yii::t('app', 'Send Message'), 'url' => ['/message/send-message']],
				],
			];
        $menuItems[] = ['label' => 'Profile', 'url' => ['/users/basicinfo']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
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

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?>
		<?php	
		Yii::$app->view->on(View::EVENT_END_BODY, function () {
			echo date('Y-m-d');
		});
		?>
		</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
