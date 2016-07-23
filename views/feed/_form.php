<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\MapsAsset;
use yii\helpers\ArrayHelper;
use app\models\Category;
use kartik\select2\Select2;
MapsAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Feed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feed-form free-card">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

	<?php //= $form->field($model, 'media')->textInput(['maxlength' => true]) ?>
	<div class="form-group is-empty is-fileinput">
		<label for="inputFile" class="col-md-2 control-label">File</label>

		<div class="col-md-10">
			<input type="text" readonly="" class="form-control" placeholder="Browse...">
			<input type="file" id="inputFile" name="media">
		</div>
	</div>

	<?= $form->field($model, 'location')->hiddenInput(['id'=>'location'])->label(false) ?>
	<div id="map"></div>
	<?php $result = Category::find()->all();
	$array = ArrayHelper::map($result, 'id', 'name');

	echo $form->field($model, 'category_id')->widget(Select2::classname(), [
	'data' => $array,
	'options' => ['placeholder' => 'Select a state ...'],
	'pluginOptions' => [
		'allowClear' => true
	],
]);

	//<?= $form->field($model, 'category_id')->textInput()

 ?>


	<?= $form->field($model, 'start_datetime')->textInput() ?>

	<?= $form->field($model, 'end_datetime')->textInput() ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>

<?php



?>