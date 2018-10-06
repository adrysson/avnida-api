<?php
use Migrations\AbstractMigration;

class AlterAnuncios extends AbstractMigration
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
        $table->renameColumn('tipo_id', 'tipo_negociacao_id');
        $table->update();

        $table = $this->table('anuncios_anuncios_tipos');
        $table->rename('anuncios_anuncios_tipos_negociacao');
        $table->update();

        $table = $this->table('anuncios_tipos');
        $table->rename('anuncios_tipos_negociacao');
        $table->update();
    }
}
