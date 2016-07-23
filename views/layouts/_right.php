<?php
use app\models\Category;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>
<div class="col-md-3 hidden-xs">
    <div class="free-card" style="height: 100%;">
        <h3>Categories:</h3>
        <div class="btn-group-vertical free-btn-group" style="display: block">
            <?php foreach (Category::find()->all() as $cat): ?>
                <?= Html::a($cat->name, Url::to(['category/view', 'id' => $cat->id]), [
                    'class' => 'btn btn-raised btn-lg btn-default'
                ]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>