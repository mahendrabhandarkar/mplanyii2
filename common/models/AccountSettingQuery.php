<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AccountSetting]].
 *
 * @see AccountSetting
 */
class AccountSettingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AccountSetting[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AccountSetting|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
