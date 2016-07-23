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
            </div>
        </div>
    </div>
</div>
