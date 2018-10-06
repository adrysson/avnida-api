<?php
use Migrations\AbstractMigration;

class CreateImagensPosteriores extends AbstractMigration
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
        $table = $this->table('imagens_posteriores');
        $table->addColumn('imagem_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('imagem_posterior_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imagem_id', 'imagens', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imagens_posteriores_imagens'
        ]);
        $table->addForeignKey('imagem_posterior_id', 'imagens', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imagens_posteriores_imagem_posterior'
        ]);
        $table->create();
    }
}
