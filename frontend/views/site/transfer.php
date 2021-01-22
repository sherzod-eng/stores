<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<div class="col-md-12">
<h3 align="center">Income product</h3>
<p style="color: red" class="info-box"></p>
<?php
$form = ActiveForm::begin([
    'id' => 'insertProduct'
]);
echo $form->field($model, 'out_store_id')->dropDownList([ArrayHelper::map(frontend\models\Store::find()->all(),'id','name')], ['id' => 'out_store']);
echo $form->field($model, 'product_id')->dropDownList([ArrayHelper::map(frontend\models\Product::find()->all(),'id','name')], ['id' => 'product']);
echo $form->field($model, 'qty')->textInput(['id' => 'qty']);
echo $form->field($model, 'income_store_id')->dropDownList([ArrayHelper::map(frontend\models\Store::find()->all(),'id','name')], ['id' => 'inc_store']);
echo Html::submitButton('Saqlash', ['class' => 'btn btn-danger']);
ActiveForm::end();
?>
</div>