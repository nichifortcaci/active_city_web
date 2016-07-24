<?php
use yii\helpers\Url;

$title = $feed->title;
$src = $feed->getSrc();
if (empty($feed->media)) {
    $card_image = <<<HTML
<div class="card-image"
     style="background-image: url('{$src}')">
    <h3 class="card-image-headline">{$title}</h3>
</div>
HTML;
} else {
    $card_image = <<<HTML
<div class="card-image">
    <img src="{$src}" alt="Loading image...">
    <h3 class="card-image-headline">{$title}</h3>
</div>
HTML;
}

?>
<a href="<?= Url::to(['feed/view', 'id' => $feed->id]) ?>">
    <div class="col-md-4 col-sm-6">
        <div class="card">
            <div class="card-height-indicator"></div>
            <div class="card-content">
                <?= $card_image ?>
                <div class="card-body">
                    <p><?= $feed->content ?></p>
                </div>
                <footer class="card-footer">
                    <button class="btn btn-raised btn-primary">Read More</button>
                </footer>
            </div>
        </div>
    </div>
</a>