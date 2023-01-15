<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserAutologin]].
 *
 * @see UserAutologin
 */
class UserAutologinQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserAutologin[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserAutologin|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
