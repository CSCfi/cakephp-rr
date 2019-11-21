<?php
namespace App\Controller;
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Utility\Security;
use Cake\Utility\Hash;
/**
 * Rps Controller
 *
 * @property \App\Model\Table\RpsTable $Rps
 *
 * @method \App\Model\Entity\Rp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RpsController extends AppController
{

		public function initialize()
    {
       parent::initialize();
       if (($this->Auth->user('status') === 'admin') || (in_array($this->request->clientIp(),['86.50.55.18','86.50.55.113','86.50.27.106','86.50.168.221','86.50.55.117']))) {
          $this->Auth->allow(['index']);
       } else {
          throw new ForbiddenException(); 
       }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {	
      $federation_id = $this->request->getQuery('fdid');
      if ($federation_id==0) die();
      $query = $this->Rps->find('all',['contain' => ['GrantTypes', 'ResponseTypes', 'Scopes','Federations','TokenEndpointAuthenticationMethods']])->matching('Federations', function ($q) use ($federation_id) {return $q->where(['Federations.id' => $federation_id]);});
			foreach ($query as $row) {
        $scopestring = $scopes = $scope = $client = $redirect_uris = null;
				$scopes = Hash::extract($row['scopes'], '{n}.scope');
				foreach($scopes as $scope) :
					$scopestring = $scopestring ." ". $scope;
				endforeach;
				$grant_types = Hash::extract($row['grant_types'], '{n}.grant_type');
				$response_types = Hash::extract($row['response_types'], '{n}.response_type');
        $token_endpoint_authentication_methods = Hash::extract($row['token_endpoint_authentication_methods'], '{n}.token_endpoint_authentication_method');
				$redirect_uris = array_map('trim',explode(PHP_EOL, $row['redirect_uris']));
				$client['client_id'] = $row['client_identifier'];
				$client['client_name'] = $row['client_name'];
				if ($row['client_secret']) $client['client_secret'] = $row['client_secret'];
				$client['scope'] = ltrim($scopestring);
				if (!empty($grant_types)) $client['grant_types'] = $grant_types;
				$client['response_types'] = $response_types;
        //if (!empty($token_endpoint_authentication_methods)) $client['token_endpoint_auth_method'] = $token_endpoint_authentication_methods;
        if (!empty(array_filter($redirect_uris))) $client['redirect_uris'] = array_filter($redirect_uris);
				if ($row['token_endpoint_auth_method']) $client['token_endpoint_auth_method'] = $row['token_endpoint_auth_method'];
				$clients[] = $client;
			}
      $this->set('_jsonOptions', JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES );
      $this->set(compact('clients'));
//      $this->set('_serialize', ['clients']);
/*	  $this->RequestHandler->respondAs('json');
	    $this->response->type('application/json');  
      $this->autoRender = false; 
    	echo json_encode($clients, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES );
*/
    }
}
