<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Kleurcode $model */

$this->title = 'Create Kleurcode';
$this->params['breadcrumbs'][] = ['label' => 'Kleurcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kleurcode-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
