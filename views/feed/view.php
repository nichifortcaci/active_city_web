<?php

use app\models\Category;
use app\models\User;
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
    ]
];

?>
<div class="feed-view">

    <div class="row row-eq-height">
        <div class="col-md-9">
            <div class="free-card">
                <h1 class="text-center">
                    <?= Html::encode($this->title) ?>
                    <br>
                    <small>written by <?= $user->name ?></small>
                </h1>
                <div class="row">
                    <div class="col-md-6">
                        <?= $model->displayDate() ?>
                    </div>
                    <div class="col-md-6">
                        <?= $category->name ?>
                    </div>
                </div>
                <div class="map"></div>
                <div class="media">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            <div class="item">
                                <img src="..." alt="...">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                            ...
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <?php foreach ($media as $item): ?>
                        <?php if ($item['type'] == 1): ?>
                            <!--                            --><? //= Html::img($item['path']) ?>
                        <?php elseif ($item['type'] == 2): ?>

                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <h4>
                    <?= $model->content ?>
                </h4>
            </div>
        </div>
        <?= $this->render('../layouts/_right') ?>
    </div>

</div>
