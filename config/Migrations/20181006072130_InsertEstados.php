<?php
use Migrations\AbstractMigration;

class InsertEstados extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $rows = [
            [
                'id'    => 1,
                'uf'    => 'AC',
                'nome'  => 'Acre',
            ],
            [
                'id'    => 2,
                'ativo' => 1,
                'uf'    => 'AL',
                'nome'  => 'Alagoas',
            ],
            [
                'id'    => 3,
                'uf'    => 'AP',
                'nome'  => utf8_decode('Amapá'),
            ],
            [
                'id'    => 4,
                'uf'    => 'AM',
                'nome'  => 'Amazonas',
            ],
            [
                'id'    => 5,
                'uf'    => 'BA',
                'nome'  => 'Bahia',
            ],
            [
                'id'    => 6,
                'uf'    => 'CE',
                'nome'  => utf8_decode('Ceará'),
            ],
            [
                'id'    => 7,
                'uf'    => 'DF',
                'nome'  => 'Distrito Federal',
            ],
            [
                'id'    => 8,
                'uf'    => 'ES',
                'nome'  => utf8_decode('Espírito Santo'),
            ],
            [
                'id'    => 9,
                'uf'    => 'GO',
                'nome'  => utf8_decode('Goiás'),
            ],
            [
                'id'    => 10,
                'uf'    => 'MA',
                'nome'  => utf8_decode('Maranhão'),
            ],
            [
                'id'    => 11,
                'uf'    => 'MT',
                'nome'  => 'Mato Grosso',
            ],
            [
                'id'    => 12,
                'uf'    => 'MS',
                'nome'  => 'Mato Grosso do Sul',
            ],
            [
                'id'    => 13,
                'uf'    => 'MG',
                'nome'  => 'Minas Gerais',
            ],
            [
                'id'    => 14,
                'uf'    => 'PA',
                'nome'  => utf8_decode('Pará'),
            ],
            [
                'id'    => 15,
                'uf'    => 'PB',
                'nome'  => utf8_decode('Paraíba'),
            ],
            [
                'id'    => 16,
                'uf'    => 'PR',
                'nome'  => utf8_decode('Paraná'),
            ],
            [
                'id'    => 17,
                'uf'    => 'PE',
                'nome'  => 'Pernambuco',
            ],
            [
                'id'    => 18,
                'uf'    => 'PI',
                'nome'  => utf8_decode('Piauí'),
            ],
            [
                'id'    => 19,
                'uf'    => 'RJ',
                'nome'  => 'Rio de Janeiro',
            ],
            [
                'id'    => 20,
                'uf'    => 'RN',
                'nome'  => 'Rio Grande do Norte',
            ],
            [
                'id'    => 21,
                'uf'    => 'RS',
                'nome'  => 'Rio Grande do Sul',
            ],
            [
                'id'    => 22,
                'uf'    => 'RO',
                'nome'  => utf8_decode('Rondônia'),
            ],
            [
                'id'    => 23,
                'uf'    => 'RR',
                'nome'  => 'Roraima',
            ],
            [
                'id'    => 24,
                'uf'    => 'SC',
                'nome'  => 'Santa Catarina',
            ],
            [
                'id'    => 25,
                'uf'    => 'SP',
                'nome'  => utf8_decode('São Paulo'),
            ],
            [
                'id'    => 26,
                'uf'    => 'SE',
                'nome'  => 'Sergipe',
            ],
            [
                'id'    => 27,
                'uf'    => 'TO',
                'nome'  => 'Tocantins'
            ]
        ];

        $this->table('estados')->insert($rows)->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM estados');
    }}
