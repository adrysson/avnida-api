<?php
use Migrations\AbstractMigration;

class AlterUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
     public function change()
     {
         $table = $this->table('users');
         $table->changeColumn('tipo_id', 'integer', [
             'default' => 1,
             'limit' => 11,
             'null' => false,
         ]);
         $table->changeColumn('grupo_id', 'integer', [
             'default' => 1,
             'limit' => 11,
             'null' => false,
         ]);
         $table->changeColumn('status_id', 'integer', [
             'default' => 1,
             'limit' => 11,
             'null' => false,
         ]);
         $table->update();
     }}
