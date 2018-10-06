<?php
use Migrations\AbstractMigration;

class CreateImoveisImoveisDiferenciais extends AbstractMigration
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
        $table = $this->table('imoveis_imoveis_diferenciais');
        $table->addColumn('imovel_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('diferencial_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addForeignKey('imovel_id', 'imoveis', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_diferenciais_imoveis'
        ]);
        $table->addForeignKey('diferencial_id', 'imoveis_diferenciais', 'id', [
            'delete'=> 'CASCADE',
            'constraint' => 'fk_imoveis_diferenciais_diferenciais'
        ]);
        $table->create();
    }
}
