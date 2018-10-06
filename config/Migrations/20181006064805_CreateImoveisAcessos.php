<?php
use Migrations\AbstractMigration;

class CreateImoveisAcessos extends AbstractMigration
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
        $table = $this->table('imoveis_acessos');
        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_acessos_imoveis'
        ]);
        $table->create();
    }
}
