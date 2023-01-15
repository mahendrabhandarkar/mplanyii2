<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PartnerBasic]].
 *
 * @see PartnerBasic
 */
class PartnerBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PartnerBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PartnerBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
