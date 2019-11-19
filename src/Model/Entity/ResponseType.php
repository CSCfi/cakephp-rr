<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ResponseType Entity
 *
 * @property int $id
 * @property string|null $response_type
 *
 * @property \App\Model\Entity\Rp[] $rps
 */
class ResponseType extends Entity
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
        'response_type' => true,
        'rps' => true
    ];
}
