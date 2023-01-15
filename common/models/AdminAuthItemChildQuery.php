<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AdminAuthItemChild]].
 *
 * @see AdminAuthItemChild
 */
class AdminAuthItemChildQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AdminAuthItemChild[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AdminAuthItemChild|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
