<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserLifestyle]].
 *
 * @see UserLifestyle
 */
class UserLifestyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserLifestyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserLifestyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
