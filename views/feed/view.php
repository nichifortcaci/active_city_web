<?php

use app\models\Category;
use app\models\Comment;
use app\models\Support;
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Feed */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Feeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$category = Category::findOne($model->category_id);
$user = User::findOne($model->user_id);

$date = [
    [
        'day' => date('d', strtotime($model->start_datetime)),
        'month' => date('F', strtotime($model->start_datetime)),
        'year' => date('Y', strtotime($model->start_datetime)),
        'time' => date('H:m', strtotime($model->start_datetime)),
    ],
];
?>
<div class="feed-view">

    <div class="row row-eq-height">
        <div class="col-md-9">
            <div class="free-card">
                <div class="row">
                    <div class="col-xs-2">
                        <?= Html::img($user->getPhoto(), [
                            'class' => 'user-photo'
                        ]) ?>
                    </div>
                    <div class="col-xs-10">
                        <h1 class="text-center feed-title">
                            <?= Html::encode($this->title) ?>
                            <br>
                            <small>written by <b><?= $user->name ?></b></small>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="sdate">
                            <div class="sday"><?= $date[0]['day'] ?></div>
                            <div class="other_sdate">
                                <div class="smounth"><?= $date[0]['month'] ?></div>
                                <div class="other_syear_time">
                                    <span class="syear"><?= $date[0]['year'] ?></span>
                                    <span class="stime"><?= $date[0]['time'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <span style="font-size: 19px; display: inline-block;"><?= $category->name ?></span>
                            <?= Html::img('/storage/accident_min.png', [
                                'style' => 'width: 50px; display: inline-block;'
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="map"></div>
                <div class="media">
                    <?php if ($model->hasMedia()): ?>
                        <?= Html::img($model->getMedia(), [
                        ]) ?>
                    <?php endif; ?>

                    <h4>
                        <b>Map:</b>
                    </h4>

                    <?= Html::img($model->getMapImg()) ?>
                </div>
                <button id="support" class="pull-right btn btn-raised btn-warning btn-fab"
                        data-feed-id="<?= $model->id ?>"
                        style="margin: 10px 0;" <?= Support::hasSupport($model->id) ? "disabled" : "" ?>>
                    <i class="material-icons">done</i>
                </button>
                <h4>
                    <b>Description:</b>
                    <br>
                    <?= $model->content ?>
                    <br>
                    <br>
                    <a href="<?= Url::to(['feed/export', 'id' => $model->id]) ?>"
                       class="btn btn-raised btn-success pull-right">Export</a>
                </h4>
            </div>
            <?php if (!(Yii::$app->user->isGuest && count(Comment::findAll(['feed_id' => $model->id])))): ?>
                <div class="free-card feed-comments" style="margin-top: 18px">
                    <h4><b>Comments:</b></h4>
                    <div class="comm" id="comments">
                        <?php foreach (Comment::findAll(['feed_id' => $model->id]) as $c):
                            $c_user = User::findOne($c->user_id);
                            ?>
                            <div class="comm-item">
                                <?= Html::img($c_user->getPhoto(), ['class' => 'pull-left']) ?>
                                <div class="comm-details">
                                    <p class="comm-details-sub">
                                        <b>
                                            <?= $c_user->name ?>
                                        </b>
                                        <span class="date text-muted">
                                    <?= Yii::$app->formatter->asDatetime($c->created_at) ?>
                                </span>
                                    </p>
                                    <?= Html::tag('p', $c->comment, [
                                        'class' => 'comm-user-comment'
                                    ]) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <?php $form = ActiveForm::begin([
                            'id' => 'comment-form',
                            'action' => ['comment/create']
                        ]);
                        $comment = new Comment();
                        ?>

                        <div class="form-group label-floating is-empty">
                            <label class="control-label" for="addon2">Comment</label>
                            <div class="input-group">
                                <input type="text" id="addon2" class="form-control">
                                <span class="input-group-btn">
                            <button type="submit" id="fake-add-comm" class="btn btn-fab btn-fab-mini btn-warning">
                                <i class="material-icons">send</i>
                            </button>
                        </span>
                            </div>
                        </div>

                        <?= $form->field($comment, 'user_id')->hiddenInput([
                            'value' => $model->id
                        ])->label(false) ?>

                        <?php ActiveForm::end(); ?>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
        <?= $this->render('../layouts/_right') ?>
    </div>

</div>
<div class="hidden">
    <?php if (!Yii::$app->user->isGuest): ?>
        <?php
        $current = User::findOne(Yii::$app->user->id);
        ?>
        <div class="comm-item">
            <img class="pull-left" src="<?= $current->getPhoto() ?>" alt="">
            <div class="comm-details">
                <p class="comm-details-sub">
                    <b><?= $user->name ?></b>
                    <span class="date text-muted">Jul 24, 2016 <span class="time">10:45:15</span> PM</span>
                </p>
                <p class="comm-user-comment"></p></div>
        </div>
    <?php endif; ?>
</div>