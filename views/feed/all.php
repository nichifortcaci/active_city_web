<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models\Feed;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var array $data */

$this->title = 'Feeds';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (!Yii::$app->user->isGuest): ?>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Create new Feed
</button>

<?php endif; ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Create New Feed</h4>
            </div>
            <div class="modal-body" id="feed-body">

            </div>
        </div>
    </div>
</div>


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