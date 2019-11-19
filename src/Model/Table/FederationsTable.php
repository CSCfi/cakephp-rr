<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Federations Model
 *
 * @property \App\Model\Table\RpsTable|\Cake\ORM\Association\BelongsToMany $Rps
 *
 * @method \App\Model\Entity\Federation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Federation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Federation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Federation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Federation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Federation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Federation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Federation findOrCreate($search, callable $callback = null, $options = [])
 */
class FederationsTable extends Table
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

        $this->setTable('federations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Rps', [
            'foreignKey' => 'federation_id',
            'targetForeignKey' => 'rp_id',
            'joinTable' => 'rps_federations'
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
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmptyString('description');

        return $validator;
    }
}
