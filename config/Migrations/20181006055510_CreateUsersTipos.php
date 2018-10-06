<?php
use Migrations\AbstractMigration;

class CreateUsersTipos extends AbstractMigration
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
        $this->table('users_tipos')
          ->addColumn('nome', 'string', [
              'default' => null,
              'limit' => 255,
              'null' => false,
          ])
          ->create();
    }
}
