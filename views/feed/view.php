<?php

use app\models\Category;
use app\models\Comment;
use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feed */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Feeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$category = Category::findOne($model->category_id);
$user = User::findOne($model->user_id);

$media = [
    [
        'type' => 1,
        'path' => '/storage/test.jpg'
    ],
    [
        'type' => 1,
        'path' => '/storage/test.jpg'
    ],
    [
        'type' => 1,
        'path' => '/storage/test.jpg'
    ],
];
$date = [
    [
        'day' => date('d', strtotime($model->start_datetime)),
        'month' => date('F', strtotime($model->start_datetime)),
        'year' => date('Y', strtotime($model->start_datetime)),
        'time' => date('H:m', strtotime($model->start_datetime)),
    ],
]
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
                            <span style="font-size: 19px;"><?= $category->name ?></span>
                            <?= Html::img('/storage/accident_min.png', [
                                'style' => 'width: 50px;'
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="map"></div>
                <div class="media">
                    <div id="owl-example" class="owl-carousel">
                        <?php foreach ($media as $item): ?>
                            <div class="item">

                                <?php if ($item['type'] == 1): ?>
                                    <?= Html::img($item['path']) ?>
                                <?php elseif ($item['type'] == 2): ?>

                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <h4>
                    <?= $model->content ?>
                </h4>
            </div>
            <div class="free-card feed-comments" style="margin-top: 18px">
                <div class="comm">
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
                            <button type="button" id="fake-add-comm" class="btn btn-fab btn-fab-mini btn-warning">
                                <i class="material-icons">send</i>
                            </button>
                        </span>
                    </div>
                </div>

                <?= $form->field($comment, 'user_id')->hiddenInput([
                    'value' => $model->id
                ])->label(false) ?>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
        <?= $this->render('../layouts/_right') ?>
    </div>

</div>
