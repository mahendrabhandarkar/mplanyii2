<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PartnerBackground]].
 *
 * @see PartnerBackground
 */
class PartnerBackgroundQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PartnerBackground[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PartnerBackground|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
