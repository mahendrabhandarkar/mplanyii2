<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[PartnerLifestyle]].
 *
 * @see PartnerLifestyle
 */
class PartnerLifestyleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PartnerLifestyle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PartnerLifestyle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
