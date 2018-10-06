<?php
use Migrations\AbstractMigration;

class CreateImoveisImoveisItensInclusos extends AbstractMigration
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
        $table = $this->table('imoveis_imoveis_itens_inclusos');
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('item_incluso_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_intens_inclusos_imoveis'
        ]);
        $table->addForeignKey('item_incluso_id', 'imoveis_itens_inclusos', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_itens_inclusos_intens_inclusos'
        ]);
        $table->create();
    }
}
