<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[UserFile]].
 *
 * @see UserFile
 */
class UserFileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserFile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserFile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
