<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Kleurcode $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kleurcode-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kleur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'useridint')->textInput() ?>

    <?= $form->field($model, 'created_by_userid')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by_userid')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
