<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Join to us';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-login">
    <div class="row">
        <div class="col-md-5 col-sm-8 col-centered">
            <div class="free-card" id="auth">

                <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

                <p class="text-center">with</p>
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['site/auth'],
                    'popupMode' => true,
                ]) ?>
                <button class="btn btn-block btn-social btn-twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </button>
                <button class="btn btn-block btn-social btn-google">
                    <i class="fa fa-google-plus"></i>
                    Google
                </button>
                <button class="btn btn-block btn-social btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                    Linkedin
                </button>
                <button class="btn btn-block btn-social btn-yahoo">
                    <i class="fa fa-yahoo"></i>
                    Yahoo
                </button>

                <p class="text-center"> - OR - </p>

                <button class="btn btn-block btn-social btn-social-none">
<!--                    <i class="fa fa-yahoo"></i>-->
                    Username and Pasword
                </button>
            </div>
        </div>
    </div>
</div>
