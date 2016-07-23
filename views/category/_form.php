<?php

use helpers\Helper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-md-offset-9 col-sm-offset-6">
                <?= Html::submitButton(($model->isNewRecord ? 'Create' : 'Update') . Helper::iconMD('send', [
                        'class' => 'pull-right material-icons'
                    ]), [
                    'class' => 'btn btn-block btn-raised btn-warning'
                ]) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
