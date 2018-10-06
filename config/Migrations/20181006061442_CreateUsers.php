<?php
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('email_verificado', 'boolean', [
            'default' => 0,
            'null' => false,
        ]);
        $table->addColumn('telefone', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('tipo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('creci', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => null,
        ]);
        $table->addColumn('estado_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('endereco_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('grupo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('status_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addForeignKey('tipo_id', 'users_tipos', 'id', [
            'constraint' => 'fk_users_tipos'
        ]);
        $table->addForeignKey('estado_id', 'estados', 'id', [
            'constraint' => 'fk_users_estados'
        ]);
        $table->addForeignKey('endereco_id', 'enderecos', 'id', [
            'constraint' => 'fk_users_enderecos'
        ]);
        $table->addForeignKey('grupo_id', 'users_grupos', 'id', [
            'constraint' => 'fk_users_grupos'
        ]);
        $table->addForeignKey('status_id', 'users_status', 'id', [
            'constraint' => 'fk_users_status'
        ]);
        $table->create();
    }
}
