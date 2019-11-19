<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Scopes Model
 *
 * @property \App\Model\Table\RpsTable|\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\Scope get($primaryKey, $options = [])
 * @method \App\Model\Entity\Scope newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Scope[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Scope|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scope saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Scope patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Scope[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Scope findOrCreate($search, callable $callback = null, $options = [])
 */
class ScopesTable extends Table
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

        $this->setTable('scopes');
        $this->setDisplayField('scope');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'scope_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_scopes'
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
            ->scalar('scope')
            ->maxLength('scope', 255)
            ->allowEmptyString('scope');

        return $validator;
    }
}
