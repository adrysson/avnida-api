<?php
use Migrations\AbstractMigration;

class CreateImoveisItensSeguranca extends AbstractMigration
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
        $table = $this->table('imoveis_itens_seguranca');
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
            'constraint' => 'fk_itens_seguranca_imoveis'
        ]);
        $table->create();
    }
}
