<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m201220_155640_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()(),
            'surname' => $this->string()(),
            'patronymic' => $this->string()(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
