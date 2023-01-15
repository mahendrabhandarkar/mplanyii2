<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AdminAuthItem]].
 *
 * @see AdminAuthItem
 */
class AdminAuthItemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AdminAuthItem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AdminAuthItem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
