<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserSearch]].
 *
 * @see UserSearch
 */
class UserSearchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserSearch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserSearch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
