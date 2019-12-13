<?php
use Migrations\AbstractMigration;

class CreateEnderecos extends AbstractMigration
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
        $table = $this->table('enderecos');
        $table->addColumn('logradouro', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('cep', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => true,
        ]);
        $table->addColumn('complemento', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('bairro', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('localidade', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('estado_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('unidade', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('localizacao', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
        ]);
        $table->addColumn('numero', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => true,
        ]);
        $table->addForeignKey('estado_id', 'estados', 'id', [
            'constraint' => 'fk_enderecos_estados'
        ]);
        $table->create();
    }
}
