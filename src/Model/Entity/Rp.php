<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rp Entity
 *
 * @property int $id
 * @property string|null $client_identifier
 * @property string|null $client_secret
 * @property string|null $client_name
 *
 * @property \App\Model\Entity\RpsGranttype[] $rps_granttypes
 * @property \App\Model\Entity\ResponseType[] $response_types
 * @property \App\Model\Entity\Scope[] $scopes
 */
class Rp extends Entity
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
        'client_identifier' => true,
        'client_secret' => true,
        'client_name' => true,
      	'redirect_uris' => true,
        'grant_types' => true,
        'response_types' => true,
        'scopes' => true,
      	'users' => true,
       	'federations' => true,
      	'token_endpoint_auth_method' => true,
        'token_endpoint_authentication_methods' => true
    ];
}
