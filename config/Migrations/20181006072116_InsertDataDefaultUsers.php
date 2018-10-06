<?php
use Migrations\AbstractMigration;

class InsertDataDefaultUsers extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $rows = [
            [
              'id'    => 1,
              'nome'  => 'Gratuito'
            ],
            [
              'id'    => 2,
              'nome'  => 'Premium'
            ]
        ];
        $this->table('users_tipos')->insert($rows)->save();

        $rows = [
            [
              'id'    => 1,
              'nome'  => 'Ativo'
            ],
            [
              'id'    => 2,
              'nome'  => 'Inativo'
            ]
        ];
        $this->table('users_status')->insert($rows)->save();

        $rows = [
            [
              'id'    => 1,
              'nome'  => 'Visitante'
            ],
            [
                'id'    => 2,
                'nome'  => 'Corretor'
            ],
            [
                'id'    => 3,
                'nome'  => 'Imobiliária'
            ],
            [
                'id'    => 4,
                'nome'  => 'Administrador'
            ],
            [
                'id'    => 5,
                'nome'  => 'Desenvolvedor'
            ]
        ];
        $this->table('users_grupos')->insert($rows)->save();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM users_tipos');
        $this->execute('DELETE FROM users_status');
        $this->execute('DELETE FROM users_grupos');
    }
}
