<?php
namespace App\Controller\V1;

use App\Controller\V1\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tipos', 'Estados', 'Enderecos' => ['Estados'], 'Grupos', 'Status']
        ];
        $users = $this->paginate($this->Users);

        $this->set([
            'users' => $users,
            '_serialize' => ['users']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UsersTipos', 'Estados', 'Enderecos', 'UsersGrupos', 'UsersStatus', 'Imagens', 'Anuncios']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $usersTipos = $this->Users->UsersTipos->find('list', ['limit' => 200]);
        $estados = $this->Users->Estados->find('list', ['limit' => 200]);
        $enderecos = $this->Users->Enderecos->find('list', ['limit' => 200]);
        $usersGrupos = $this->Users->UsersGrupos->find('list', ['limit' => 200]);
        $usersStatus = $this->Users->UsersStatus->find('list', ['limit' => 200]);
        $imagens = $this->Users->Imagens->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersTipos', 'estados', 'enderecos', 'usersGrupos', 'usersStatus', 'imagens'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Imagens']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $usersTipos = $this->Users->UsersTipos->find('list', ['limit' => 200]);
        $estados = $this->Users->Estados->find('list', ['limit' => 200]);
        $enderecos = $this->Users->Enderecos->find('list', ['limit' => 200]);
        $usersGrupos = $this->Users->UsersGrupos->find('list', ['limit' => 200]);
        $usersStatus = $this->Users->UsersStatus->find('list', ['limit' => 200]);
        $imagens = $this->Users->Imagens->find('list', ['limit' => 200]);
        $this->set(compact('user', 'usersTipos', 'estados', 'enderecos', 'usersGrupos', 'usersStatus', 'imagens'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
