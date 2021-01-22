<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="col-md-12">
<h3 align="center">Yangi ombor qo'shish</h3>
<?php
$form = ActiveForm::begin([
    'id' => 'addProduct'
]);

echo $form->field($model, 'name');
echo $form->field($model, 'description')->textarea();
echo $form->field($model, 'price');
echo $form->field($model, 'image')->fileInput();
echo $form->field($model, 'key_word');
echo Html::submitButton('Saqlash', ['class' => 'btn btn-danger']);
ActiveForm::end();
?>
</div>