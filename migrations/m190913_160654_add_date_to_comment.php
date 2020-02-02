<?php

use yii\db\Migration;

/**
 * Class m190913_160654_add_date_to_comment
 */
class m190913_160654_add_date_to_comment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->addColumn('comment', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190913_160654_add_date_to_comment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190913_160654_add_date_to_comment cannot be reverted.\n";

        return false;
    }
    */
}
