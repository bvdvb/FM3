<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Kleurcode $model */

$this->title = 'Update Kleurcode: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kleurcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kleurcode-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
