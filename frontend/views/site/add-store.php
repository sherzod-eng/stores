<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="col-md-6">
<h3 align="center">Yangi ombor qo'shish</h3>
<?php
$form = ActiveForm::begin([
    'id' => 'addStore'
]);

echo $form->field($model, 'name');
echo Html::submitButton('Saqlash', ['class' => 'btn btn-danger']);
ActiveForm::end();
?>
</div>
<div class="col-md-6">
<h3 align="center">Mavjud omborlar ro'yxati.</h3>
<?php
    foreach($allStore as $item){
        echo '<table class="table">';
        echo '<tr>';
        echo '<td>';
        echo $item->name;
        echo '</td>';
        echo '</tr>';
        echo '</table>';
    }
?>
</div>