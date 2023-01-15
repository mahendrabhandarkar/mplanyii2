<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[FormMaster]].
 *
 * @see FormMaster
 */
class FormMasterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return FormMaster[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return FormMaster|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}