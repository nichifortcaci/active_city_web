<?php
/**
 * Created by PhpStorm.
 * User: hobroker
 * Date: 7/24/16
 * Time: 6:02 AM
 */
use app\models\Category;
use app\models\Support;
use app\models\User;
use yii\bootstrap\Html;

$user = User::findOne($model->user_id);
$category = Category::findOne($model->category_id);
?>
<h1 class="text-center">Feed #<?= $model->id ?></h1>

<h3><?= $model->title ?></h3>

<p>
    <b>Author:</b>
    <?= $user->name ?>
</p>

<p>
    <b>Category:</b>
    <?= $category->name ?>
</p>

<p>
    <b>Date:</b>
    <?= $model->displayDate() ?>
</p>

<p>
    <b>Content:</b>
    <?= $model->content ?>
</p>

<?php if ($model->hasMedia()): ?>
    <p>
        <b>Media:</b>
    </p>
    <?= Html::img($model->getMedia(), [
        'style' => 'max-height: 200px'
    ]) ?>
<?php endif; ?>
<p>
    <b>Map:</b>
</p>
<?= Html::img($model->getMapImg()) ?>
<br>
<br>
<br>
<?php if (count(Support::findAll(['feed_id' => $model->id]))): ?>

    <p>
        <b>Support: </b>
    <ol>
        <?php foreach (Support::findAll(['feed_id' => $model->id]) as $s): ?>
            <?= Html::tag('li', User::findOne($s->user_id)->name) ?>
        <?php endforeach; ?>
    </ol>
    </p>
<?php endif; ?>
