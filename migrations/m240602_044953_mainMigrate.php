<?php

use yii\db\Migration;

/**
 * Class m240602_044953_mainMigrate
 */
class m240602_044953_mainMigrate extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'phone' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'birtday' => $this->date()
        ]);
        $this->createTable('sale_card', [
            'id' => $this->primaryKey(),
            'number' => $this->string()->notNull(),
            'balance' => $this->integer()->notNull()->defaultValue(0),
            'date'=>$this->date(),
            'user_id' => $this->integer()
        ]);
        $this->addForeignKey(
            'sale_to_user_fk',
            'sale_card',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'price' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull()
        ]);
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
        $this->createTable('categories_mini', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey(
            'products_to_category_fk',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'products_to_category_fk',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createTable('basket', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'basket_to_product_fk',
            'basket',
            'product_id',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'basket_to_user_fk',
            'basket',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('basket');
        $this->dropTable('categories');
        $this->dropTable('products');
        $this->dropTable('sale_card');
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240420_140316_InitDB cannot be reverted.\n";

        return false;
    }
    */
}
