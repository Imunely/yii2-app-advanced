<?php

use yii\db\Migration;

/**
 * Class m220616_185946_msg
 */
class m220616_185946_msg extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'user_id_from' => $this->integer()->notNull(),
            'user_id_to' => $this->integer()->notNull(),
            'message' => $this->string()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey(
            'user_id_from',  // это "условное имя" ключа
            'messages', // это название текущей таблицы
            'user_id_from', // это имя поля в текущей таблице, которое будет ключом
            'localUsers', // это имя таблицы, с которой хотим связаться
            'id', // это поле таблицы, с которым хотим связаться
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220616_185946_msg cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220616_185946_msg cannot be reverted.\n";

        return false;
    }
    */
}
