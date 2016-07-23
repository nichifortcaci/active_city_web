<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'media')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'start_datetime')->textInput() ?>

    <?= $form->field($model, 'end_datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
