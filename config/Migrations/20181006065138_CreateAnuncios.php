<?php
use Migrations\AbstractMigration;

class CreateAnuncios extends AbstractMigration
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
        $table = $this->table('anuncios');
        $table->addColumn('titulo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('descricao', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('status_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
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
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_anuncios_imoveis'
        ]);
        $table->addForeignKey('status_id', 'anuncios_status', 'id', [
            'constraint' => 'fk_anuncios_status'
        ]);
        $table->addForeignKey('user_id', 'users', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_anuncios_users'
        ]);
        $table->create();
    }
}
