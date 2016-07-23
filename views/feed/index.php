<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feed', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content',
            'media',
            'location',
            // 'category_id',
            // 'start_datetime',
            // 'end_datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
