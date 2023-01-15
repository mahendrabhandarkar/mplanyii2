<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SubCommunity]].
 *
 * @see SubCommunity
 */
class SubCommunityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SubCommunity[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SubCommunity|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
