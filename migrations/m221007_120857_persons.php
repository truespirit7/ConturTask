<?php

use yii\db\Migration;

/**
 * Class m221007_120857_persons
 */
class m221007_120857_persons extends Migration
{
//    /**
//     * {@inheritdoc}
//     */
//    public function safeUp()
//    {
//
//    }
//
//    /**
//     * {@inheritdoc}
//     */
//    public function safeDown()
//    {
//        echo "m221007_120857_persons cannot be reverted.\n";
//
//        return false;
//    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('persons', ['id'=>$this->primaryKey(),
            'name'=>$this->string(50),
            'phone'=>$this->string(50),
            'email'=>$this->string(100),

        ]);

    }

    public function down()
    {
        echo "m221007_120857_persons cannot be reverted.\n";

        return false;
    }

}
