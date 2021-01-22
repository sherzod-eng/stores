<?php

namespace frontend\models;

use Yii;
use frontend\models\Store;
use frontend\models\Product;

/**
 * This is the model class for table "operation".
 *
 * @property int $id
 * @property int|null $out_store_id
 * @property int $product_id
 * @property int $qty
 * @property int $income_store_id
 * @property string $operation_date
 */
class Operation extends \yii\db\ActiveRecord
{

    protected $out_store;
    protected $inc_store;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['out_store_id', 'product_id', 'qty', 'income_store_id'], 'integer'],
            [['product_id', 'qty', 'operation_date'], 'required'],
            [['operation_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'out_store_id' => 'Chiqim ombori',
            'product_id' => 'Mahsulot',
            'qty' => 'Miqdor',
            'income_store_id' => 'Kirim ombori',
            'operation_date' => 'Operation Date',
        ];
    }

   public function allStore()
   {
        $res = Store::find()->all();

        return $res;

   }

   public function Result($id, $data)
   {   
       $count = Product::find()->count();
       $str = '';
        for($i = 1; $i <= $count; $i++){
        $product = Product::find()
        ->where(['id' => $i])
        ->all();

        $out = Operation::find()
        ->where(['out_store_id' => $id])
        ->andWhere(['<', 'operation_date', $data])
        ->andWhere(['product_id' => $i])
        ->sum('qty');

        $inc = Operation::find()
        ->where(['income_store_id' => $id])
        ->andWhere(['<', 'operation_date', $data])
        ->andWhere(['product_id' => $i])
        ->sum('qty');

        $res = $inc - $out; 
        foreach($product as $p){
        $str .= $p->name.'-------->'.$res.' ta<br>';
            }
        }
        return $str;
   }

   public function getRes($out, $pro)
   {
        $out_count = Operation::find()
        ->where(['product_id' => $pro])
        ->andWhere(['out_store_id' => $out])
        ->sum('qty');

        $inc_count = Operation::find()
        ->where(['product_id' => $pro])
        ->andWhere(['income_store_id' => $out])
        ->sum('qty');

        return $inc_count - $out_count;
   }
}
