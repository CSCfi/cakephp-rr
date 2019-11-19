<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ResponseTypes Controller
 *
 * @property \App\Model\Table\ResponseTypesTable $ResponseTypes
 *
 * @method \App\Model\Entity\ResponseType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResponseTypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $responseTypes = $this->paginate($this->ResponseTypes);

        $this->set(compact('responseTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responseType = $this->ResponseTypes->get($id, [
            'contain' => ['Rps']
        ]);

        $this->set('responseType', $responseType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responseType = $this->ResponseTypes->newEntity();
        if ($this->request->is('post')) {
            $responseType = $this->ResponseTypes->patchEntity($responseType, $this->request->getData());
            if ($this->ResponseTypes->save($responseType)) {
                $this->Flash->success(__('The response type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The response type could not be saved. Please, try again.'));
        }
        $rps = $this->ResponseTypes->Rps->find('list', ['limit' => 200, 'keyField'=>'id','valueField'=>'client_name']);
        $this->set(compact('responseType', 'rps'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responseType = $this->ResponseTypes->get($id, [
            'contain' => ['Rps']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responseType = $this->ResponseTypes->patchEntity($responseType, $this->request->getData());
            if ($this->ResponseTypes->save($responseType)) {
                $this->Flash->success(__('The response type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The response type could not be saved. Please, try again.'));
        }
        $rps = $this->ResponseTypes->Rps->find('list', ['limit' => 200, 'keyField'=>'id','valueField'=>'client_name']);
        $this->set(compact('responseType', 'rps'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Response Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responseType = $this->ResponseTypes->get($id);
        if ($this->ResponseTypes->delete($responseType)) {
            $this->Flash->success(__('The response type has been deleted.'));
        } else {
            $this->Flash->error(__('The response type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
