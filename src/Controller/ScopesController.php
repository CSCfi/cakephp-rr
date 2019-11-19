<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Scopes Controller
 *
 * @property \App\Model\Table\ScopesTable $Scopes
 *
 * @method \App\Model\Entity\Scope[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ScopesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $scopes = $this->paginate($this->Scopes);

        $this->set(compact('scopes'));
    }

    /**
     * View method
     *
     * @param string|null $id Scope id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $scope = $this->Scopes->get($id, [
            'contain' => ['Rps']
        ]);

        $this->set('scope', $scope);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $scope = $this->Scopes->newEntity();
        if ($this->request->is('post')) {
            $scope = $this->Scopes->patchEntity($scope, $this->request->getData());
            if ($this->Scopes->save($scope)) {
                $this->Flash->success(__('The scope has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scope could not be saved. Please, try again.'));
        }
        $rps = $this->Scopes->Rps->find('list', ['limit' => 200, 'keyField'=>'id','valueField'=>'client_name']);
        $this->set(compact('scope', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Scope id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $scope = $this->Scopes->get($id, [
            'contain' => ['Rps']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $scope = $this->Scopes->patchEntity($scope, $this->request->getData());
            if ($this->Scopes->save($scope)) {
                $this->Flash->success(__('The scope has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The scope could not be saved. Please, try again.'));
        }
        $rps = $this->Scopes->Rps->find('list', ['limit' => 200, 'keyField'=>'id','valueField'=>'client_name']);
        $this->set(compact('scope', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Scope id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $scope = $this->Scopes->get($id);
        if ($this->Scopes->delete($scope)) {
            $this->Flash->success(__('The scope has been deleted.'));
        } else {
            $this->Flash->error(__('The scope could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
