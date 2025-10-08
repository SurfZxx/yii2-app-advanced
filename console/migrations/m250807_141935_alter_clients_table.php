<?php

use yii\db\Migration;

class m250807_141935_alter_clients_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Add a new column 'status' to the 'clients' table
        $this->addColumn('{{%clients}}', 'bio', $this->string()->after('email'));
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250807_141935_alter_clients_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250807_141935_alter_clients_table cannot be reverted.\n";

        return false;
    }
    */
}
