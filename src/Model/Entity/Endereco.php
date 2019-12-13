<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Endereco Entity
 *
 * @property int $id
 * @property string $logradouro
 * @property string $cep
 * @property string $complemento
 * @property string $bairro
 * @property string $localidade
 * @property int $estado_id
 * @property string $unidade
 * @property string $localizacao
 * @property int $numero
 *
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Imovei[] $imoveis
 * @property \App\Model\Entity\User[] $users
 */
class Endereco extends Entity
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
        'estado_id'
    ];
}
