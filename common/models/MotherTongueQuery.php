<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[MotherTongue]].
 *
 * @see MotherTongue
 */
class MotherTongueQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MotherTongue[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MotherTongue|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
