<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TokenEndpointAuthenticationMethod Entity
 *
 * @property int $id
 * @property string $token_endpoint_authentication_method
 *
 * @property \App\Model\Entity\Rp[] $rps
 */
class TokenEndpointAuthenticationMethod extends Entity
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
        'token_endpoint_authentication_method' => true,
        'rps' => true
    ];
}
