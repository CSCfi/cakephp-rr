<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $eppn
 * @property string|null $family_name
 * @property string|null $given_name
 * @property string|null $email
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
        'username' => true,
        'eppn' => true,
        'family_name' => true,
        'given_name' => true,
        'email' => true,
				'status' => true,
				'rps' => true
    ];
}
