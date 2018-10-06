<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class InsertUserRoot extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {

        $row = [
            'id'        => 1,
            'estado_id' => 2,
        ];

        $this->table('enderecos')->insert($row)->saveData();

        $row = [
            'id'                => 1,
            'nome'              => 'Boss',
            'email'             => 'dev@avnida.com.br',
            'password'          => (new DefaultPasswordHasher())->hash('devavnida'),
            'email_verificado'  => 1,
            'tipo_id'           => 2,
            'estado_id'         => 2,
            'endereco_id'       => 1,
            'grupo_id'          => 5,
            'status_id'         => 1
        ];

        $this->table('users')->insert($row)->saveData();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM users');
        $this->execute('DELETE FROM enderecos');
    }
}
