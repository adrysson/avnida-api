<?php
namespace Auth\Controller;

use Auth\Controller\AppController;
use Firebase\JWT\JWT;
use Cake\Utility\Security;

/**
 * Login Controller
 *
 *
 * @method \Auth\Model\Entity\Login[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            if ($user = $this->Auth->identify()) {
                $this->Auth->setUser($user);
                $data = [
                    'token' => JWT::encode([
                        'sub' => $user['id'],
                        'exp' => time() + 3600 * 24
                    ], Security::salt())
                ];
                $this->set([
                    'data' => $data,
                    '_serialize' => ['data']
                ]);
            } else{
                return $this->response->withStatus(422)->withStringBody('Usuário ou senha inválidos');
            }
        }
    }

}
