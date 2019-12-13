<?php
use Migrations\AbstractMigration;

class InsertDataDefaultAnuncios extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $rows = [
            [
                'id'    => 1,
                'nome'  => "Aluguel"
            ],
            [
                'id'    => 2,
                'nome'  => utf8_decode("Lançamento")
            ],
            [
                'id'    => 3,
                'nome'  => "Venda"
            ],
            [
                'id'    => 4,
                'nome'  => "Temporada"
            ],
        ];
        $this->table('anuncios_tipos')->insert($rows)->save();


        $rows = [
            [
                'id'    => 1,
                'nome'  => "Ativo"
            ],
            [
                'id'    => 2,
                'nome'  => "Inativo"
            ],
        ];
        $this->table('anuncios_status')->insert($rows)->save();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM anuncios_tipos');
        $this->execute('DELETE FROM anuncios_status');
    }
}
