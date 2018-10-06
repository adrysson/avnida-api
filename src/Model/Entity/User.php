<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property bool $email_verificado
 * @property string $telefone
 * @property int $tipo_id
 * @property string $creci
 * @property int $estado_id
 * @property int $endereco_id
 * @property int $grupo_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\UsersTipo $users_tipo
 * @property \App\Model\Entity\Estado $estado
 * @property \App\Model\Entity\Endereco $endereco
 * @property \App\Model\Entity\UsersGrupo $users_grupo
 * @property \App\Model\Entity\UsersStatus $users_status
 * @property \App\Model\Entity\Anuncio[] $anuncios
 * @property \App\Model\Entity\Imagen[] $imagens
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
