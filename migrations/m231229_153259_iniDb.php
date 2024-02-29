<?php

use yii\db\Migration;

/**
 * Class m231229_153259_iniDb
 */
class m231229_153259_iniDb extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->unique()->notNull(),
            'password' => $this->string(120)->notNull(),
            'last_name' => $this->string(60)->notNull(),
            'first_name' => $this->string(60)->notNull(),
            'patronimic' => $this->string(60)->null(),
        ]);

        $this->insert('users', [
            'email' => 'admin@admin.admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'last_name' => 'family_admin',
            'first_name' => 'admin',
        ]);
        $this->createTable('dir_product_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),

        ]);
        $this->createTable('dir_bird_type', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),

        ]);
        $this->createTable('dir_family_bird', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),

        ]);
        $this->createTable('dir_color_bird', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),

        ]);
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),
            'type_id' => $this->integer()->notNull(),
            'price' => $this->float()->defaultValue(0)->notNull()

        ]);
        $this->addForeignKey(
            'product_to_type_fk',
            'product',
            'type_id',
            'dir_product_type',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->createTable('birds', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'description' => $this->text()->null(),
            'type_id' => $this->integer()->notNull(),
            'price' => $this->float()->defaultValue(0)->notNull(),
            'family_id' => $this->integer()->notNull(),
            'color_id' => $this->integer()->notNull(),

        ]);
        $this->addForeignKey(
            'bird_to_type_fk',
            'birds',
            'type_id',
            'dir_bird_type',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'bird_to_family_fk',
            'birds',
            'family_id',
            'dir_family_bird',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'bird_to_color_fk',
            'birds',
            'color_id',
            'dir_color_bird',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->createTable('cart', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'total_price' => $this->float()->defaultValue(0)->notNull(),
            'is_paid' => $this->boolean()->defaultValue(false)->notNull(),

        ]);
        $this->addForeignKey(
            'user_to_cart_fk',
            'cart',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->createTable('product_to_cart', [
            'id' => $this->primaryKey(),
            'cart_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->null(),
            'bird_id' => $this->integer()->null(),
        ]);
        $this->addForeignKey(
            'product_to_cart_fk',
            'product_to_cart',
            'cart_id',
            'cart',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'cart_to_product_fk',
            'product_to_cart',
            'product_id',
            'product',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'cart_to_bird_fk',
            'product_to_cart',
            'bird_id',
            'birds',
            'id',
            'CASCADE',
            'CASCADE'

        );



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product_to_cart');
        $this->dropTable('cart');
        $this->dropTable('birds');
        $this->dropTable('product');
        $this->dropTable('dir_product_type');
        $this->dropTable('dir_bird_type');
        $this->dropTable('dir_family_bird');
        $this->dropTable('dir_color_bird');
        $this->dropTable('users');
        echo 'удалена';
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231229_153259_iniDb cannot be reverted.\n";

        return false;
    }
    */
}
