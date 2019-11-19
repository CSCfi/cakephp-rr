<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GrantTypes Model
 *
 * @property |\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\GrantType get($primaryKey, $options = [])
 * @method \App\Model\Entity\GrantType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GrantType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GrantType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GrantType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GrantType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GrantType findOrCreate($search, callable $callback = null, $options = [])
 */
class GrantTypesTable extends Table
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

        $this->setTable('grant_types');
        $this->setDisplayField('grant_type');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'grant_type_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_grant_types'
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
            ->scalar('grant_type')
            ->maxLength('grant_type', 255)
            ->allowEmptyString('grant_type');

        return $validator;
    }
}
