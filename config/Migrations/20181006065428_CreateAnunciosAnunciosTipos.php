<?php
use Migrations\AbstractMigration;

class CreateAnunciosAnunciosTipos extends AbstractMigration
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
        $table = $this->table('anuncios_anuncios_tipos');
        $table->addColumn('anuncio_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('tipo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('anuncio_id', 'anuncios', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_anuncios_anuncios_tipos_anuncios'
        ]);
        $table->addForeignKey('tipo_id', 'anuncios_tipos', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_anuncios_anuncios_tipos_anuncios_tipos'
        ]);
        $table->create();
    }
}
