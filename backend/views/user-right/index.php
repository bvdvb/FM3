<?php ?>

<h1>user-right/index</h1>








<body>
    <div id='wrap'>
        <table border='1' class="align-items-stretch">
            <?php
            //header row
            $roles = \Yii::$app->authManager->getRoles();
            $rolehtml = '<thead><tr><th></th>';
            $checkboxhtml = '';
            $colcount = 0;
            foreach ($roles as $key => $value) {
                $rolehtml .= ("<th class='text-center'>" . $value->name . "</th>");
                $checkboxhtml .= "<td class='text-center'>" . yii\bootstrap4\Html::checkbox('replnm_' . urlencode($value->name),0,['class'=>'permcheckbox', 'id' => 'replnm_' . urlencode($value->name)]) . "</td>";
                $colcount += 1;
            };
            $rolehtml .= "</tr></thead>";
            echo $rolehtml;

            echo "<tbody>";
            $routes = new mdm\admin\models\Route();
            //yii\helpers\VarDumper::dump($a->getAppRoutes(),10,true);
            foreach ($routes->getAppRoutes() as $key2 => $value2) {
                echo "<tr><td >" . $value2 . "</td>" . str_replace('replnm_', urlencode($value2) . '_', $checkboxhtml) . "</tr>";
            }
            echo "</tbody>";
            ?>    
        </table>
    </div>
</body>

<?php
?>

<?php
// 

$this->registerJsFile(
        '@web/js/userright.js',
        ['depends' => [
                \yii\web\JqueryAsset::class,
                'yii\web\YiiAsset',
                'yii\bootstrap4\BootstrapAsset',
                'yii\jui\JuiAsset',
            ]]
);
?>