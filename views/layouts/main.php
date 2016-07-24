<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\ImageAsset;
use app\assets\MaterialAsset;
use app\models\Category;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Feed;

MaterialAsset::register($this);
AppAsset::register($this);
$img = ImageAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Active City',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Feed', 'url' => ['/feed/index']],
            ['label' => 'Categories', 'url' => '#', 'items' => Category::getNav()],
            Yii::$app->user->isGuest ? (
            ['label' => 'Login', 'url' => ['/site/login']]
            ) :
                ['label' => 'Logout <b>(' . Yii::$app->user->identity->name . ')</b>', 'url' => ['/site/logout']],
        ],
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Active City <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
<?php

// $this->registerJsFile("https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrIRLPaIZFiQs7pJN6nN6iBZO9G4t41Q&v=3.exp");
// $this->registerJsFile(Yii::$app->request->baseUrl."/js/feed_create.js");
$this->registerJsFile("https://maps.googleapis.com/maps/api/js?key=AIzaSyBLrIRLPaIZFiQs7pJN6nN6iBZO9G4t41Q&v=3.exp", ['position' => \yii\web\View::POS_END]);
$this->registerJsFile(Yii::$app->request->baseUrl."/js/feed_create.js", ['position' => \yii\web\View::POS_END]);

if(Yii::$app->controller->id=='site' && Yii::$app->controller->action->id=='index'):
    ob_start();?>
    //<script>
    <?php
        $result = Feed::find()->limit(10)->orderBy('id DESC')->all();
        if(1 || (isset($result[0]) && isset($result[0]->location) && $result[0]->location)){
             $location = json_decode($result[0]->location,1);
        }else{
             $location = json_decode('{"latitude":47.0056,"longitude":28.8575}',1);
        }
    ?>
    googleMapGenerator.options.breakpointDynamicMap = 768;
    googleMapGenerator.options.mapLat = <?=$location['latitude']?>;
    googleMapGenerator.options.mapLng = <?=$location['longitude']?>;
    googleMapGenerator.options.mapZoom = 17;
    googleMapGenerator.options.markerIconType = 'numeric';
    googleMapGenerator.options.markerIconHexBackground = 'ff6600';
    googleMapGenerator.options.markerIconHexColor = '000000';
    googleMapGenerator.options.hasPrint = false;
    googleMapGenerator.options.locations = [
    <?php
        
        foreach ($result as $row){
            $location = json_decode($row->location,1);
            echo('["'.$row->title.'","Republica Moldova Chișinău","'.$row->content.'",'.$location['latitude'].','.$location['longitude'].'],'."\n");
    }

    ?>
    ];

    // Init
    var map = new googleMapGenerator();
    <?php
    $code = ob_get_clean();
    $this->registerJs($code,  \yii\web\View::POS_END);
endif;
?>
</body>
</html>
<?php $this->endPage() ?>
