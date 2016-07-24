<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var array $data */

$this->title = 'Feeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php foreach ($data as $cat_name => $feeds): ?>
        <?php if (count($feeds)): ?>
            <div class="row">
                <div class="col-xs-12">
                    <?= Html::tag('h3', $cat_name) ?>
                </div>
                <?php foreach ($feeds as $feed): ?>
                    <?= $this->render('_item', [
                        'feed' => $feed
                    ]) ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>