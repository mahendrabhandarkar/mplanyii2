<?php

use yii\db\Migration;

/**
 * Class m211116_121214_admin_init_rbac
 */
class m211116_121214_admin_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211116_121214_admin_init_rbac cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
		$auth = Yii::$app->authManager;

        // add "createProfile" permission
        $createProfile = $auth->createPermission('createProfile');
        $createProfile->description = 'Create a profile';
        $auth->add($createProfile);

        // add "updateProfile" permission
        $updateProfile = $auth->createPermission('updateProfile');
        $updateProfile->description = 'Update profile';
        $auth->add($updateProfile);

        // add "searchProfile" permission
        $searchProfile = $auth->createPermission('searchProfile');
        $searchProfile->description = 'Search profile';
        $auth->add($searchProfile);

        // add "sendMessage" permission
        $sendMessage = $auth->createPermission('sendMessage');
        $sendMessage->description = 'Send message';
        $auth->add($sendMessage);

		// roles
		$superadmin = $auth->createRole('superadmin');
		$auth->add($superadmin);
		$samajverifier = $auth->createRole('samajverifier');
		$auth->add($samajverifier);
		$groom = $auth->createRole('groom');
		$auth->add($groom);
		$bride = $auth->createRole('bride');
		$auth->add($bride);
		
        // "createProfile" permission
        $auth->addChild($samajverifier, $createProfile);
		$auth->addChild($groom, $createProfile);
		$auth->addChild($bride, $createProfile);

        // "updateProfile" permission
        $auth->addChild($samajverifier, $updateProfile);
		$auth->addChild($groom, $updateProfile);
		$auth->addChild($bride, $updateProfile);
		
        // "searchProfile" permission
        $auth->addChild($samajverifier, $searchProfile);
		$auth->addChild($groom, $searchProfile);
		$auth->addChild($bride, $searchProfile);
		$auth->addChild($superadmin, $searchProfile);
		
        // "sendMessage" permission
        $auth->addChild($samajverifier, $sendMessage);
        $auth->addChild($groom, $sendMessage);
		$auth->addChild($bride, $sendMessage);
		$auth->addChild($superadmin, $sendMessage);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
		$auth->assign($bride, 4);
		$auth->assign($groom, 3);
        $auth->assign($samajverifier, 2);
        $auth->assign($superadmin, 1);
    }

    public function down()
    {
        echo "m211116_121214_admin_init_rbac cannot be reverted.\n";
		$auth = Yii::$app->authManager;

        $auth->removeAll();

        return false;
    }
    
}
