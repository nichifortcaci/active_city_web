<?php

use app\widgets\ButtonGroup;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = 'Update Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">
    <div class="row">
        <div class="col-xs-12">
            <?= ButtonGroup::widget(['links' => [
                ['Index', ['index'], ['class' => 'btn btn-primary']]
            ]]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-10 col-centered">
            <div class="free-card">
                <h2><?= Html::encode($this->title) ?></h2>

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>

</div>
