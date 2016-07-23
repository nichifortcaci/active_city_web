<?php
/**
 * Created by PhpStorm.
 * User: hobroker
 * Date: 7/23/16
 * Time: 5:17 PM
 */
use yii\bootstrap\Html;

?>
<div class="btn-group btn-group-raised">
    <?php foreach ($data as $item):
        if (empty($item[2]))
            $item[2] = [];
        echo Html::a($item[0], $item[1], $item[2]);
    endforeach; ?>
</div>
