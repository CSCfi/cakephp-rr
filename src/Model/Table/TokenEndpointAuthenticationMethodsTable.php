<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TokenEndpointAuthenticationMethods Model
 *
 * @property \App\Model\Table\RpsTable|\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod get($primaryKey, $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod findOrCreate($search, callable $callback = null, $options = [])
 */
class TokenEndpointAuthenticationMethodsTable extends Table
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

        $this->setTable('token_endpoint_authentication_methods');
        $this->setDisplayField('token_endpoint_authentication_method');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'token_endpoint_authentication_method_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_token_endpoint_authentication_methods'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('token_endpoint_authentication_method')
            ->maxLength('token_endpoint_authentication_method', 30)
            ->requirePresence('token_endpoint_authentication_method', 'create')
            ->allowEmptyString('token_endpoint_authentication_method', false);

        return $validator;
    }
}
