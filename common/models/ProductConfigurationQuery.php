<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductConfiguration]].
 *
 * @see ProductConfiguration
 */
class ProductConfigurationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductConfiguration[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductConfiguration|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}