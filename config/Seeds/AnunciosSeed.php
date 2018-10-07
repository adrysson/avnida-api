<?php
use Migrations\AbstractSeed;

/**
 * Anuncios seed.
 */
class AnunciosSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=2; $i <= 6; $i++) {
            $enderecos[] = [
                'id'            => $i,
                'logradouro'    => $faker->streetAddress,
                'cep'           => $faker->postcode,
                'complemento'   => $faker->secondaryAddress,
                'bairro'        => $faker->streetName,
                'localidade'    => $faker->city,
                'estado_id'     => rand(1, 27),
                'localizacao'   => $faker->latitude().','.$faker->longitude(),
                'numero'        => $faker->buildingNumber,
            ];
        };

        for ($i=1; $i < 5; $i++) {
            $imagens[] = [
                'id'        => $i,
                'arquivo'   => "imovel-seed-$i.png",
            ];
        }

        for ($i=1; $i < 5; $i++) {
            $imoveis[] = [
                'id'            => $i,
                'area_total'    => $area_total = rand(80, 150),
                'area_util'     => $area_total - rand(10, 30),
                'banheiros'     => rand(1, 3),
                'vagas_garagem' => rand(1, 2),
                'preco'         => $faker->randomFloat(2, 70000, 1000000),
                'quartos'       => rand(1, 3),
                'suites'        => rand(1, 2),
                'condominio'    => $faker->randomFloat(2, 50, 550),
                'iptu'          => $faker->randomFloat(2, 500, 3500),
                'endereco_id'   => $i+1,
                'imagem_id'     => $i,
                'tipo_id'       => rand(1, 3),
            ];
        }

        for ($i=1; $i < 5; $i++) {
            $anuncios[] = [
                'id'=> $i,
                'titulo' => $faker->sentence,
                'descricao' => $faker->paragraph,
                'imovel_id' => $i,
                'status_id' => 1,
                'user_id' => 1,
            ];
        }

        for ($i=1; $i < 5; $i++) {
            for ($j=0; $j < 2; $j++) {
                $anuncios_tipos_negociacao[] = [
                    'anuncio_id' => $i,
                    'tipo_negociacao_id' => rand(1, 4),
                ];
            }
        }

        $table = $this->table('enderecos');
        $table->insert($enderecos)->save();

        $table = $this->table('imagens');
        $table->insert($imagens)->save();

        $table = $this->table('imoveis');
        $table->insert($imoveis)->save();

        $table = $this->table('anuncios');
        $table->insert($anuncios)->save();

        $table = $this->table('anuncios_anuncios_tipos_negociacao');
        $table->insert($anuncios_tipos_negociacao)->save();

    }
}
