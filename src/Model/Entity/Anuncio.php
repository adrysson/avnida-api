<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anuncio Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $descricao
 * @property int $imovel_id
 * @property int $status_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Imovei $imovei
 * @property \App\Model\Entity\AnunciosStatus $anuncios_status
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AnunciosTiposNegociacao[] $anuncios_tipos_negociacao
 */
class Anuncio extends Entity
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
        'imovel_id',
        'status_id',
        'user_id',
    ];
}
