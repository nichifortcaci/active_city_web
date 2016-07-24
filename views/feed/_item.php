<?php
use yii\bootstrap\Html;
use yii\helpers\Url;

$title = $feed->title;
$src = $feed->getSrc();

?>
<a href="<?= Url::to(['feed/view', 'id' => $feed->id]) ?>">
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <div class="card-height-indicator"></div>
            <div class="card-content">
                <div class="card-image"
                     style="background-image: url('<?= $src ?>')">
                    <h3 class="card-image-headline"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <a href="<?= Url::to(['category/view', 'id' => $feed->category_id]) ?>">
                        <span class="badge badge-warning"><?= $feed->getCategoryName() ?></span>
                    </a>
                    <p><?= $feed->content ?></p>
                </div>
                <footer class="card-footer">
                    <?= Html::a('Read More', Url::to(['feed/view', 'id' => $feed->id]), [
                        'class' => 'btn btn-raised btn-primary',
                        'style' => 'left: 0'
                    ]) ?>
                </footer>
            </div>
        </div>
    </div>
</a>
