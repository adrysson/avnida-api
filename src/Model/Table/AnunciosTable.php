<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anuncios Model
 *
 * @property \App\Model\Table\ImoveisTable|\Cake\ORM\Association\BelongsTo $Imoveis
 * @property \App\Model\Table\AnunciosStatusTable|\Cake\ORM\Association\BelongsTo $AnunciosStatus
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnunciosTiposNegociacaoTable|\Cake\ORM\Association\BelongsToMany $AnunciosTiposNegociacao
 *
 * @method \App\Model\Entity\Anuncio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Anuncio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Anuncio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Anuncio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Anuncio findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AnunciosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('anuncios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Imoveis', [
            'propertyName' => 'imovel',
            'foreignKey' => 'imovel_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Status', [
            'className' => 'AnunciosStatus',
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('TiposNegociacao', [
            'className' => 'AnunciosTiposNegociacao',
            'foreignKey' => 'anuncio_id',
            'targetForeignKey' => 'tipo_negociacao_id',
            'joinTable' => 'anuncios_anuncios_tipos_negociacao'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 255)
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->scalar('descricao')
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['imovel_id'], 'Imoveis'));
        $rules->add($rules->existsIn(['status_id'], 'Status'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    public function afterDelete($anuncio)
    {
        $imovel = $this->Imoveis->get($anuncio->_data['entity']['imovel_id']);
        return $this->Imoveis->delete($imovel);
    }
}
