<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\MapsAsset;
use yii\helpers\ArrayHelper;
use app\models\Category;
MapsAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Feed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'media')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->hiddenInput(['id'=>'location'])->label(false) ?>
    <div id="map"></div>
    <?php $result = Category::find()->all(); ?>
      <?=Html::activeDropDownList($model, 'category_id',ArrayHelper::map($result, 'id', 'name'),['class'=>'select']) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'start_datetime')->textInput() ?>

    <?= $form->field($model, 'end_datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php



?>