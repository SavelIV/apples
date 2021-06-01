<?php

use yii\db\Migration;

/**
 * Class m210601_160348_apple_table
 */
class m210601_160348_apple_table extends Migration
{
    const TABLE = '{{%apple}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $options = $this->db->getDriverName() == 'mysql' ? 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci' : null;
        $this->createTable(self::TABLE,
            [
                'id' => $this->primaryKey(),
                'color' => $this->string()->notNull(),
                'status' => $this->smallInteger(1)->notNull()->defaultValue(1)->comment('1 - on the tree; 2 - fallen/on the ground; 3 - rotten'),
                'size' => $this->integer(3)->notNull()->defaultValue(100)->comment('percentage(%)'),

                'createdAt' => $this->dateTime()->null()->defaultValue(null),
                'updatedAt' => $this->dateTime()->null()->defaultValue(null),
                'fallenAt' => $this->dateTime(),
            ],
            $options
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE);
    }
}
