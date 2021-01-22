<?php
namespace frondend\models;

use Yii;

use yii\db\Query;

class Store
{
    public function Insert()
    {
        $query = new Query();
        $count = $query
        ->select('*')
        ->from('operation')
        ->orderBy
    }
}