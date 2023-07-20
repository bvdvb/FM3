<?php

$this->registerAssetBundle(\backend\assets\AdminLtePluginAsset::className(), $this::POS_HEAD);
/** @var yii\web\View $this */
?>
<?php
echo \common\widgets\klantformwidgetv2\Klantformwidgetv2::widget([
                    'model' => $model,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
])
?>