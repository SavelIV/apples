<?php

namespace backend\models\query;

use backend\models\Apple;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\backend\models\Apple]].
 *
 * @see \backend\models\Apple
 */
class AppleQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Apple[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Apple|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
