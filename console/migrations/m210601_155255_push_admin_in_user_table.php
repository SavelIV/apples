<?php

use yii\db\Migration;

/**
 * Class m210601_155255_push_admin_in_user_table
 */
class m210601_155255_push_admin_in_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => '3ng_Vhp5SVxBY-FANbqRHx8yyYGxtgRC',
            'password_hash' => '$2y$13$.iioHcxwK2Rzf9vsqTQSk.gswYTtGR52TsGzsNP8VcojkKDU5Y3Bm',
            'verification_token' => 'JhAEwlm2RRmUC96jPHex4xbTJDGWjQrp_1622328195',
            'password_reset_token' => NULL,
            'created_at' => 1622328195,
            'updated_at' => 1622328195,
            'email' => 'admin@admin.com',
            'status' => 10,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
    }
}
