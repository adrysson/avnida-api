<?php
use Migrations\AbstractMigration;

class InsertDataDefaultImoveis extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $rows = [
            [
                'id'    => 1,
                'nome'  => "Vias de acesso"
            ],
            [
                'id'    => 2,
                'nome'  => "Shopping center"
            ],
            [
                'id'    => 3,
                'nome'  => utf8_decode("Transporte público")
            ],
            [
                'id'    => 4,
                'nome'  => "Escolas"
            ],
            [
                'id'    => 5,
                'nome'  => "Hospitais"
            ]
        ];
        $this->table('imoveis_acessos')->insert($rows)->save();

        $rows = [
            [
                'id'    => 1,
                'nome'  => "Churrasqueira"
            ],
            [
                'id'    => 2,
                'nome'  => "Elevador"
            ],
            [
                'id'    => 3,
                'nome'  => "Jardim"
            ],
            [
                'id'    => 4,
                'nome'  => utf8_decode("Espaço gourmet")
            ],
            [
                'id'    => 5,
                'nome'  => "Academia"
            ],
            [
                'id'    => 6,
                'nome'  => "Playground"
            ],
            [
                'id'    => 7,
                'nome'  => utf8_decode("Salão de festas")
            ],
            [
                'id'    => 8,
                'nome'  => "Piscina"
            ],
            [
                'id'    => 9,
                'nome'  => "Quadra poliesportiva"
            ],
            [
                'id'    => 10,
                'nome'  => utf8_decode("Espaço jovem")
            ],
            [
                'id'    => 11,
                'nome'  => "Cinema em casa"
            ],
            [
                'id'    => 12,
                'nome'  => utf8_decode("Quadra de tênis")
            ],
            [
                'id'    => 13,
                'nome'  => utf8_decode("Espaço verde")
            ],
            [
                'id'    => 14,
                'nome'  => "Trilha de caminhada"
            ],
            [
                'id'    => 15,
                'nome'  => utf8_decode("Serviços públicos essenciais")
            ],
            [
                'id'    => 16,
                'nome'  => "Sauna"
            ],
            [
                'id'    => 17,
                'nome'  => "Banda de garagem"
            ],
            [
                'id'    => 18,
                'nome'  => utf8_decode("Gerador elétrico")
            ],
            [
                'id'    => 19,
                'nome'  => "Vista da montanha"
            ],
            [
                'id'    => 20,
                'nome'  => "Vista do mar"
            ],
            [
                'id'    => 21,
                'nome'  => "SPA"
            ],
            [
                'id'    => 22,
                'nome'  => "Massagem"
            ],
            [
                'id'    => 23,
                'nome'  => utf8_decode("Recepção")
            ],
            [
                'id'    => 24,
                'nome'  => utf8_decode("Salão de jogos para crianças")
            ],
            [
                'id'    => 25,
                'nome'  => utf8_decode("Salão de jogos para adultos")
            ],
            [
                'id'    => 26,
                'nome'  => "Cinema"
            ],
            [
                'id'    => 27,
                'nome'  => utf8_decode("Piscina para crianças")
            ],
            [
                'id'    => 28,
                'nome'  => "Piscina para adultos"
            ]
        ];
        $this->table('imoveis_diferenciais')->insert($rows)->save();

        $rows = [
            [
                'id'    => 1,
                'nome'  => "Vigia"
            ],
            [
                'id'    => 2,
                'nome'  => utf8_decode("Circuito de segurança")
            ],
            [
                'id'    => 3,
                'nome'  => utf8_decode("Segurança 24h")
            ],
            [
                'id'    => 4,
                'nome'  => "Interfone"
            ],
            [
                'id'    => 5,
                'nome'  => utf8_decode("Condomínio fechado")
            ]
        ];
        $this->table('imoveis_itens_seguranca')->insert($rows)->save();

        $rows = [
            [
                'id'    => 1,
                'nome'  => "Ar condicionado"
            ],
            [
                'id'    => 2,
                'nome'  => "Quintal"
            ],
            [
                'id'    => 3,
                'nome'  => "Sacada"
            ],
            [
                'id'    => 4,
                'nome'  => utf8_decode("Depósito")
            ],
            [
                'id'    => 5,
                'nome'  => "Mobiliado"
            ],
            [
                'id'    => 6,
                'nome'  => "Cabeamento completo"
            ],
            [
                'id'    => 7,
                'nome'  => "TV a cabo"
            ],
            [
                'id'    => 8,
                'nome'  => utf8_decode("Acesso à internet")
            ],
            [
                'id'    => 9,
                'nome'  => "Garagem"
            ],
            [
                'id'    => 10,
                'nome'  => "Lavanderia"
            ],
            [
                'id'    => 11,
                'nome'  => utf8_decode("Área de serviço")
            ],
            [
                'id'    => 12,
                'nome'  => "Cozinha"
            ]
        ];
        $this->table('imoveis_itens_inclusos')->insert($rows)->save();

        $rows = [
            [
                'id'    => 1,
                'nome'  => "Casa"
            ],
            [
                'id'    => 2,
                'nome'  => "Apartamento"
            ],
            [
                'id'    => 3,
                'nome'  => utf8_decode("Chácara")
            ]
        ];
        $this->table('imoveis_tipos')->insert($rows)->save();

    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->execute('DELETE FROM imoveis_acessos');
        $this->execute('DELETE FROM imoveis_diferenciais');
        $this->execute('DELETE FROM imoveis_itens_seguranca');
        $this->execute('DELETE FROM imoveis_itens_inclusos');
        $this->execute('DELETE FROM imoveis_tipos');
    }
}
