<?php
use Migrations\AbstractMigration;

class CreateUsersStatus extends AbstractMigration
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
        $table = $this->table('users_status');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => false,
        ]);
        $table->create();
    }
}
