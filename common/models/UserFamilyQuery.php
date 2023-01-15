<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserFamily]].
 *
 * @see UserFamily
 */
class UserFamilyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserFamily[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserFamily|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
