<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserProfiles]].
 *
 * @see UserProfiles
 */
class UserProfilesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserProfiles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserProfiles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
