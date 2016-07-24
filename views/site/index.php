<?php

/* @var $this yii\web\View */

use app\models\Feed;
use yii\helpers\Url;

$this->title = 'City';
?>
<div class="site-index">
    <h1>Feeds</h1>
    <hr>
    <div class="row">
        <?php foreach (Feed::find()->all() as $feed): ?>
            <?= $this->render('../feed/_item', [
                'feed' => $feed
            ]) ?>
        <?php endforeach; ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="bs-component">
                <ul class="pagination pagination-lg" style="margin: auto; display: table;">
                    <li class="disabled"><a href="javascript:void(0)">«</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)">5</a></li>
                    <li><a href="javascript:void(0)">»</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
