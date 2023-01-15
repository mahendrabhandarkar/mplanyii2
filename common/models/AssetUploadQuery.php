<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AssetUpload]].
 *
 * @see AssetUpload
 */
class AssetUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AssetUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AssetUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}