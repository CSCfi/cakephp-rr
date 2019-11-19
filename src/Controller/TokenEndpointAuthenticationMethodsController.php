<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TokenEndpointAuthenticationMethods Controller
 *
 * @property \App\Model\Table\TokenEndpointAuthenticationMethodsTable $TokenEndpointAuthenticationMethods
 *
 * @method \App\Model\Entity\TokenEndpointAuthenticationMethod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TokenEndpointAuthenticationMethodsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tokenEndpointAuthenticationMethods = $this->paginate($this->TokenEndpointAuthenticationMethods);

        $this->set(compact('tokenEndpointAuthenticationMethods'));
    }

    /**
     * View method
     *
     * @param string|null $id Token Endpoint Authentication Method id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->get($id, [
            'contain' => ['Rps']
        ]);

        $this->set('tokenEndpointAuthenticationMethod', $tokenEndpointAuthenticationMethod);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->newEntity();
        if ($this->request->is('post')) {
            $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->patchEntity($tokenEndpointAuthenticationMethod, $this->request->getData());
            if ($this->TokenEndpointAuthenticationMethods->save($tokenEndpointAuthenticationMethod)) {
                $this->Flash->success(__('The token endpoint authentication method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The token endpoint authentication method could not be saved. Please, try again.'));
        }
        $rps = $this->TokenEndpointAuthenticationMethods->Rps->find('list', ['limit' => 200]);
        $this->set(compact('tokenEndpointAuthenticationMethod', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Token Endpoint Authentication Method id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->get($id, [
            'contain' => ['Rps']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->patchEntity($tokenEndpointAuthenticationMethod, $this->request->getData());
            if ($this->TokenEndpointAuthenticationMethods->save($tokenEndpointAuthenticationMethod)) {
                $this->Flash->success(__('The token endpoint authentication method has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The token endpoint authentication method could not be saved. Please, try again.'));
        }
        $rps = $this->TokenEndpointAuthenticationMethods->Rps->find('list', ['limit' => 200]);
        $this->set(compact('tokenEndpointAuthenticationMethod', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Token Endpoint Authentication Method id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tokenEndpointAuthenticationMethod = $this->TokenEndpointAuthenticationMethods->get($id);
        if ($this->TokenEndpointAuthenticationMethods->delete($tokenEndpointAuthenticationMethod)) {
            $this->Flash->success(__('The token endpoint authentication method has been deleted.'));
        } else {
            $this->Flash->error(__('The token endpoint authentication method could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
