<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enderecos Model
 *
 * @property \App\Model\Table\EstadosTable|\Cake\ORM\Association\BelongsTo $Estados
 * @property \App\Model\Table\ImoveisTable|\Cake\ORM\Association\HasMany $Imoveis
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Endereco get($primaryKey, $options = [])
 * @method \App\Model\Entity\Endereco newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Endereco[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Endereco|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Endereco patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Endereco findOrCreate($search, callable $callback = null, $options = [])
 */
class EnderecosTable extends Table
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

        $this->setTable('enderecos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Imoveis', [
            'foreignKey' => 'endereco_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'endereco_id'
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
            ->scalar('logradouro')
            ->maxLength('logradouro', 100)
            ->allowEmpty('logradouro');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 20)
            ->allowEmpty('cep');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 255)
            ->allowEmpty('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 100)
            ->allowEmpty('bairro');

        $validator
            ->scalar('localidade')
            ->maxLength('localidade', 100)
            ->allowEmpty('localidade');

        $validator
            ->scalar('unidade')
            ->maxLength('unidade', 255)
            ->allowEmpty('unidade');

        $validator
            ->scalar('localizacao')
            ->maxLength('localizacao', 100)
            ->allowEmpty('localizacao');

        $validator
            ->integer('numero')
            ->allowEmpty('numero');

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
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));

        return $rules;
    }
}
