<?php
use Migrations\AbstractMigration;

class CreateImoveisImagens extends AbstractMigration
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
        $table = $this->table('imoveis_imagens');
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('imagem_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_imagens_imoveis'
        ]);
        $table->addForeignKey('imagem_id', 'imagens', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_imagens_imagens'
        ]);
        $table->create();
    }
}
