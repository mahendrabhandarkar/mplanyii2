<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductService]].
 *
 * @see Service
 */
class ProductServiceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductService[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductService|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}