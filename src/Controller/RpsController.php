<?php
namespace App\Controller;

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
		public function isAuthorized()
		{
  		 if (in_array($this->request->getParam('action'), ['add'])) {
        return true;
      }

			 $rpId = (int)$this->request->getParam('pass.0');
       if ($this->Rps->isOwnedBy($rpId, $this->Auth->user('id'))) {
            return true;
       }
			return parent::isAuthorized();
		}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
				if ($this->Auth->user('status')=='admin')
					$query = $this->Rps->find('all')->contain(['Federations']);
				else
					$query = $this->Rps->find('all')->contain(['Federations'])->matching('Users', function ($q) {return $q->where(['Users.id' => $this->Auth->user('id')]);});
				
			  $this->set('rps', $this->paginate($query));
    }

		public function index2()
    {
				$this->autoRender = false;
        $rps = $this->paginate($this->Rps);
				echo json_encode(compact('rps'));
//				$this->set('_serialize', 'rps');
    }


    /**
     * View method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rp = $this->Rps->get($id, [
            'contain' => ['GrantTypes', 'ResponseTypes', 'Scopes','Users','Federations','TokenEndpointAuthenticationMethods']
        ]);
				$this->set('rp', $rp);
	  }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rp = $this->Rps->newEntity();
        if ($this->request->is('post')) {
						$data = $this->request->getData();
						if ($this->Auth->user('status') != 'admin') $data['users']['_ids'][0] = $this->Auth->user('id');
            $rp = $this->Rps->patchEntity($rp, $data, ['associated' => ['Federations','Scopes','GrantTypes','ResponseTypes','Users']]);
/*            foreach($rp['redirect_uris'] as $id => $ru) :  // Fix to remove empty redirect_uris
              if ($ru['redirect_uri'] == '') unset ($rp['redirect_uris'][$id]); */
//            endforeach;
            if ($this->Rps->save($rp)) {
                $this->Flash->success(__('The rp has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rp could not be saved. Please, try again.'));
        }
				$rp['client_identifier'] = Security::hash(rand(0,1020200002000000), 'sha1', true);
				$rp['client_secret'] = Security::hash(rand(0,1020200002000000), 'sha1', true);
        $grantTypes = $this->Rps->GrantTypes->find('list', ['limit' => 200,'keyField'=>'id']);
        $responseTypes = $this->Rps->ResponseTypes->find('list', ['limit' => 200, 'keyField'=>'id']);
        if ($this->Auth->user('status') != 'admin') :
				$federations = $this->Rps->Federations->find('list', ['limit' => 200,'keyField'=>'id'])->where(['id'=>2]);
        else :
        $federations = $this->Rps->Federations->find('list', ['limit' => 200,'keyField'=>'id']);
        endif;
//				$redirectUris = $this->Rps->RedirectUris->find('list', ['limit' => 200,'keyField'=>'id','valueField'=>'redirect_uri']);
        $tokenEndpointAuthenticationMethods = $this->Rps->TokenEndpointAuthenticationMethods->find('list', ['limit' => 200,'keyField'=>'id']);
        $scopes = $this->Rps->Scopes->find('list', ['limit' => 200,'keyField'=>'id']);
				$users = $this->Rps->Users->find('list', ['limit' => 200,'keyField'=>'id']);
        $this->set(compact('rp', 'grantTypes', 'responseTypes', 'scopes','users', 'federations','tokenEndpointAuthenticationMethods'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rp = $this->Rps->get($id, [
            'contain' => ['Federations', 'GrantTypes', 'ResponseTypes', 'Scopes', 'Users','TokenEndpointAuthenticationMethods']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rp = $this->Rps->patchEntity($rp, $this->request->getData());
/*            foreach($rp['redirect_uris'] as $id => $ru) :  // Fix to remove empty redirect_uris
              if ($ru['redirect_uri'] == '') unset ($rp['redirect_uris'][$id]);*/
//            endforeach;
//            $this->Rps->RedirectUris->deleteAll(['rp_id'=>$rp['id']]); // Remove redirect_uris before save so no duplicates appears
            if ($this->Rps->save($rp)) {
                $this->Flash->success(__('The rp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rp could not be saved. Please, try again.'));
        }
        $grantTypes = $this->Rps->GrantTypes->find('list', ['limit' => 200,'keyField'=>'id']);
        $responseTypes = $this->Rps->ResponseTypes->find('list', ['limit' => 200, 'keyField'=>'id']);
        if ($this->Auth->user('status') != 'admin') :
          $federations = $results = Hash::combine($rp['federations'], '{n}.id', '{n}.name');
          if (!array_key_exists(2,$federations)):
            $federations[2] = 'CSC AAI Test';
          endif;
        else:
          $federations = $this->Rps->Federations->find('list', ['limit' => 200,'keyField'=>'id']);
        endif;
//        $redirectUris = $this->Rps->RedirectUris->find('list', ['limit' => 200,'keyField'=>'id','valueField'=>'redirect_uri'])->where(['rp_id'=>$rp->id]);
        $tokenEndpointAuthenticationMethods = $this->Rps->TokenEndpointAuthenticationMethods->find('list', ['limit' => 200,'keyField'=>'id']);
        $scopes = $this->Rps->Scopes->find('list', ['limit' => 200, 'keyField'=>'id']);
        $users = $this->Rps->Users->find('list', ['limit' => 200,'keyField'=>'id']);
				$this->set(compact('rp', 'grantTypes', 'responseTypes', 'scopes','users', 'federations','tokenEndpointAuthenticationMethods'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rp = $this->Rps->get($id);
        if ($this->Rps->delete($rp)) {
            $this->Flash->success(__('The rp has been deleted.'));
        } else {
            $this->Flash->error(__('The rp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
