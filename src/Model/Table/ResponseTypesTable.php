<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ResponseTypes Model
 *
 * @property \App\Model\Table\RpsTable|\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\ResponseType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ResponseType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ResponseType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ResponseType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResponseType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ResponseType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ResponseType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ResponseType findOrCreate($search, callable $callback = null, $options = [])
 */
class ResponseTypesTable extends Table
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

        $this->setTable('response_types');
        $this->setDisplayField('response_type');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'response_type_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_response_types'
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
            ->scalar('response_type')
            ->maxLength('response_type', 255)
            ->allowEmptyString('response_type');

        return $validator;
    }
}
