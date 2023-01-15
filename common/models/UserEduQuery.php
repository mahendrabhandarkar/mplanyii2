<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserEdu]].
 *
 * @see UserEdu
 */
class UserEduQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserEdu[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserEdu|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
