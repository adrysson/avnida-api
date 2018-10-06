<?php
use Migrations\AbstractMigration;

class CreateImoveisImoveisItensSeguranca extends AbstractMigration
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
        $table = $this->table('imoveis_imoveis_itens_seguranca');
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('item_seguranca_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_intens_seguranca_imoveis'
        ]);
        $table->addForeignKey('item_seguranca_id', 'imoveis_itens_seguranca', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_itens_seguranca_intens_seguranca'
        ]);
        $table->create();
    }
}
