<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Imoveis Model
 *
 * @property \App\Model\Table\EnderecosTable|\Cake\ORM\Association\BelongsTo $Enderecos
 * @property \App\Model\Table\ImagensTable|\Cake\ORM\Association\BelongsTo $Imagens
 * @property \App\Model\Table\ImoveisTiposTable|\Cake\ORM\Association\BelongsTo $ImoveisTipos
 * @property \App\Model\Table\ImagensTable|\Cake\ORM\Association\BelongsToMany $Imagens
 * @property \App\Model\Table\ImoveisAcessosTable|\Cake\ORM\Association\BelongsToMany $ImoveisAcessos
 * @property \App\Model\Table\ImoveisDiferenciaisTable|\Cake\ORM\Association\BelongsToMany $ImoveisDiferenciais
 * @property \App\Model\Table\ImoveisItensInclusosTable|\Cake\ORM\Association\BelongsToMany $ImoveisItensInclusos
 * @property \App\Model\Table\ImoveisItensSegurancaTable|\Cake\ORM\Association\BelongsToMany $ImoveisItensSeguranca
 *
 * @method \App\Model\Entity\Imovei get($primaryKey, $options = [])
 * @method \App\Model\Entity\Imovei newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Imovei[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Imovei|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Imovei|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Imovei patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Imovei[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Imovei findOrCreate($search, callable $callback = null, $options = [])
 */
class ImoveisTable extends Table
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

        $this->setTable('imoveis');
        $this->setEntityClass('App\Model\Entity\Imovel');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enderecos', [
            'foreignKey' => 'endereco_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Imagem', [
            'className' => 'Imagens',
            'foreignKey' => 'imagem_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tipos', [
            'className' => 'ImoveisTipos',
            'foreignKey' => 'tipo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Imagens', [
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'imagem_id',
            'joinTable' => 'imoveis_imagens'
        ]);
        $this->belongsToMany('Acessos', [
            'className' => 'ImoveisAcessos',
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'acesso_id',
            'joinTable' => 'imoveis_imoveis_acessos'
        ]);
        $this->belongsToMany('Diferenciais', [
            'className' => 'ImoveisDiferenciais',
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'diferencial_id',
            'joinTable' => 'imoveis_imoveis_diferenciais'
        ]);
        $this->belongsToMany('ItensInclusos', [
            'className' => 'ImoveisItensInclusos',
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'item_incluso_id',
            'joinTable' => 'imoveis_imoveis_itens_inclusos'
        ]);
        $this->belongsToMany('ItensSeguranca', [
            'className' => 'ImoveisItensSeguranca',
            'foreignKey' => 'imovel_id',
            'targetForeignKey' => 'item_seguranca_id',
            'joinTable' => 'imoveis_imoveis_itens_seguranca'
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
            ->integer('area_total')
            ->allowEmpty('area_total');

        $validator
            ->integer('area_util')
            ->allowEmpty('area_util');

        $validator
            ->integer('banheiros')
            ->allowEmpty('banheiros');

        $validator
            ->integer('vagas_garagem')
            ->allowEmpty('vagas_garagem');

        $validator
            ->decimal('preco')
            ->allowEmpty('preco');

        $validator
            ->integer('quartos')
            ->allowEmpty('quartos');

        $validator
            ->integer('suites')
            ->allowEmpty('suites');

        $validator
            ->scalar('video')
            ->maxLength('video', 255)
            ->allowEmpty('video');

        $validator
            ->decimal('condominio')
            ->allowEmpty('condominio');

        $validator
            ->decimal('iptu')
            ->allowEmpty('iptu');

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
        $rules->add($rules->existsIn(['endereco_id'], 'Enderecos'));
        $rules->add($rules->existsIn(['imagem_id'], 'Imagens'));
        $rules->add($rules->existsIn(['tipo_id'], 'Tipos'));

        return $rules;
    }

    public function afterDelete($anuncio)
    {
        $imovel = $this->Enderecos->get($anuncio->_data['entity']['endereco_id']);
        $this->Enderecos->delete($imovel);
        $imagem = $this->Imagem->get($anuncio->_data['entity']['imagem_id']);
        $this->Imagem->delete($imagem);
    }

}
