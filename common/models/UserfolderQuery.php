<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Userfolder]].
 *
 * @see Userfolder
 */
class UserfolderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Userfolder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Userfolder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
