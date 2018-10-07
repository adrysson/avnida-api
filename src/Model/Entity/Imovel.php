<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Imovei Entity
 *
 * @property int $id
 * @property int $area_total
 * @property int $area_util
 * @property int $banheiros
 * @property int $vagas_garagem
 * @property float $preco
 * @property int $quartos
 * @property int $suites
 * @property string $video
 * @property float $condominio
 * @property float $iptu
 * @property int $endereco_id
 * @property int $imagem_id
 * @property int $tipo_id
 *
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\Imagen[] $imagens
 * @property \App\Model\Entity\ImoveisTipo $imoveis_tipo
 * @property \App\Model\Entity\ImoveisAcesso[] $imoveis_acessos
 * @property \App\Model\Entity\ImoveisDiferenciai[] $imoveis_diferenciais
 * @property \App\Model\Entity\ImoveisItensIncluso[] $imoveis_itens_inclusos
 * @property \App\Model\Entity\ImoveisItensSeguranca[] $imoveis_itens_seguranca
 */
class Imovel extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];

    protected $_hidden = [
        'endereco_id',
        'imagem_id',
        'tipo_id',
    ];
}
