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
            'contain' => ['Tipos', 'Estados', 'Enderecos' => 'Estados', 'Grupos', 'Status']
        ];
        $users = $this->paginate($this->Users);

        $this->set([
            'users' => $users,
            '_serialize' => 'users'
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
            'contain' => ['Tipos', 'Estados', 'Enderecos' => 'Estados', 'Grupos', 'Status', 'Imagens', 'Anuncios']
        ]);

        $this->set([
            'user' => $user,
            '_serialize' => 'user'
        ]);
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
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => 'Enderecos']);
            if ($user_saved = $this->Users->save($user)) {
                $this->set([
                    'user' => $user_saved,
                    '_serialize' => 'user'
                ]);
            }else{
                $this->response = $this->response->withStatus(422);
                $this->set([
                    'errors' => $user->errors(),
                    '_serialize' => 'errors'
                ]);
            }
        }
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
            'contain' => 'Enderecos'
        ]);
        if ($this->request->is(['patch', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(), ['associated' => 'Enderecos']);
            if ($user_saved = $this->Users->save($user)) {
                $this->set([
                    'user' => $user_saved,
                    '_serialize' => 'user'
                ]);
            }else{
                $this->response = $this->response->withStatus(422);
                $this->set([
                    'errors' => $user->errors(),
                    '_serialize' => 'errors'
                ]);
            }
        }
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
        $this->request->allowMethod(['delete']);
        $user = $this->Users->get($id);
        $deleted = $this->Users->delete($user);
        $this->set([
            'user' => $user,
            'deleted' => $deleted,
            '_serialize' => ['user', 'deleted']
        ]);
    }
}
