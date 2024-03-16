<?php

use yii\db\Migration;

/**
 * Class m240316_123905_roles
 */
class m240316_123905_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->assign($admin, 1);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $auth = Yii::$app->authManager;
        $role=$auth->getRole('admin');
        $auth->remove($role);


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240316_123905_roles cannot be reverted.\n";

        return false;
    }
    */
}
