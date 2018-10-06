<?php
use Migrations\AbstractMigration;

class CreateImoveis extends AbstractMigration
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
        $table = $this->table('imoveis');
        $table->addColumn('area_total', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('area_util', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('banheiros', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('vagas_garagem', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('preco', 'decimal', [
            'default' => null,
            'null' => true,
            'precision' => 9,
            'scale' => 2,
        ]);
        $table->addColumn('quartos', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('suites', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addColumn('video', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('condominio', 'decimal', [
            'default' => null,
            'null' => true,
            'precision' => 9,
            'scale' => 2,
        ]);
        $table->addColumn('iptu', 'decimal', [
            'default' => null,
            'null' => true,
            'precision' => 9,
            'scale' => 2,
        ]);
        $table->addColumn('endereco_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('imagem_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tipo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('endereco_id', 'enderecos', 'id', [
            'constraint' => 'fk_imoveis_enderecos'
        ]);
        $table->addForeignKey('imagem_id', 'imagens', 'id', [
            'constraint' => 'fk_imoveis_imagens'
        ]);
        $table->addForeignKey('tipo_id', 'imoveis_tipos', 'id', [
            'constraint' => 'fk_imoveis_tipos'
        ]);
        $table->create();
    }
}
