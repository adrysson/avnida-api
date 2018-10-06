<?php
use Migrations\AbstractMigration;

class CreateImoveisImoveisAcessos extends AbstractMigration
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
        $table = $this->table('imoveis_imoveis_acessos');
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('acesso_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_acessos_imoveis'
        ]);
        $table->addForeignKey('acesso_id', 'imoveis_acessos', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_acessos_acessos'
        ]);
        $table->create();
    }
}
