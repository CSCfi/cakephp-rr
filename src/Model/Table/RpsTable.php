<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rps Model
 *
 * @property |\Cake\ORM\Association\BelongsToMany $GrantTypes
 * @property \App\Model\Table\ResponseTypesTable|\Cake\ORM\Association\BelongsToMany $ResponseTypes
 * @property \App\Model\Table\ScopesTable|\Cake\ORM\Association\BelongsToMany $Scopes
 *
 * @method \App\Model\Entity\Rp get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rp findOrCreate($search, callable $callback = null, $options = [])
 */
class RpsTable extends Table
{
		public function isOwnedBy($rpId, $userId)
		{
			$results = $this->find()->matching('Users', function ($q) use ($rpId,$userId) {return $q->where(['Rps.id' => $rpId, 'Users.id' => $userId]);});
    	if (!$results->isEmpty()) return true;
			return false;
		}
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('rps');
        $this->setDisplayField('client_name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('GrantTypes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'grant_type_id',
            'joinTable' => 'rps_grant_types'
        ]);
        $this->belongsToMany('ResponseTypes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'response_type_id',
            'joinTable' => 'rps_response_types'
        ]);
        $this->belongsToMany('Scopes', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'scope_id',
            'joinTable' => 'rps_scopes'
        ]);
        $this->belongsToMany('TokenEndpointAuthenticationMethods', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'token_endpoint_authentication_method_id',
            'joinTable' => 'rps_token_endpoint_authentication_methods'
        ]);
				$this->belongsToMany('Users', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'rps_users'
        ]);
				$this->belongsToMany('Federations', [
            'foreignKey' => 'rp_id',
            'targetForeignKey' => 'federation_id',
            'joinTable' => 'rps_federations'
        ]);
/*				$this->hasMany('RedirectUris', [
            'dependent' => true]);
	*/			
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
            ->scalar('client_identifier')
            ->maxLength('client_identifier', 255)
            ->allowEmptyString('client_identifier','create');

        $validator
            ->scalar('client_secret')
            ->maxLength('client_secret', 255)
            ->allowEmptyString('client_secret');

        $validator
            ->scalar('client_name')
            ->maxLength('client_name', 255);
//            ->allowEmptyString('client_name');

        return $validator;
    }
}
