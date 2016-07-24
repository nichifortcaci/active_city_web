<?php

use app\models\Feed;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">


    <h1>Category <?= $this->title ?></h1>
    <hr>

    <div class="row">
        <?php foreach (Feed::findAll(['category_id' => $model->id]) as $feed): ?>
            <?=$this->render('../feed/_item', [
                'feed' => $feed
            ])?>
        <?php endforeach; ?>

    </div>
