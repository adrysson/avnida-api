<?php
namespace App\Controller\V1;

use App\Controller\V1\AppController;

/**
 * Anuncios Controller
 *
 * @property \App\Model\Table\AnunciosTable $Anuncios
 *
 * @method \App\Model\Entity\Anuncio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AnunciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Imoveis', 'Status', 'Users']
        ];
        $anuncios = $this->paginate($this->Anuncios);

        $this->set([
            'anuncios' => $anuncios,
            '_serialize' => 'anuncios'
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => [
                'Imoveis' => ['Imagens', 'Acessos', 'Diferenciais', 'ItensInclusos', 'ItensSeguranca', 'Enderecos' => 'Estados', 'Imagem', 'Tipos'],
                'Status',
                'Users',
                'TiposNegociacao'
            ]
        ]);

        $this->set([
            'anuncio' => $anuncio,
            '_serialize' => 'anuncio'
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $anuncio = $this->Anuncios->newEntity();
        if ($this->request->is('post')) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData(), [
                'associated' => [
                    'Imoveis' => [
                        'associated' => ['Imagens', 'Acessos', 'Diferenciais', 'ItensInclusos', 'ItensSeguranca', 'Imagem', 'Enderecos', 'Tipos']
                    ]
                ]
            ]);
            if ($anuncio_saved = $this->Anuncios->save($anuncio)) {
                $this->set([
                    'anuncio' => $anuncio_saved,
                    '_serialize' => 'anuncio'
                ]);
            }else{
                $this->response = $this->response->withStatus(422);
                $this->set([
                    'errors' => $anuncio->errors(),
                    '_serialize' => 'errors'
                ]);
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $anuncio = $this->Anuncios->get($id, [
            'contain' => [
                'Imoveis' => ['Imagens', 'Acessos', 'Diferenciais', 'ItensInclusos', 'ItensSeguranca', 'Enderecos' => 'Estados', 'Imagem', 'Tipos'],
                'Status',
                'Users',
                'TiposNegociacao'
            ]
        ]);
        if ($this->request->is(['patch', 'put'])) {
            $anuncio = $this->Anuncios->patchEntity($anuncio, $this->request->getData(), [
                'associated' => [
                    'Imoveis' => [
                        'associated' => ['Imagens', 'Acessos', 'Diferenciais', 'ItensInclusos', 'ItensSeguranca', 'Imagem', 'Enderecos', 'Tipos']
                    ]
                ]
            ]);
            if ($anuncio_saved = $this->Anuncios->save($anuncio)) {
                $this->set([
                    'anuncio' => $anuncio_saved,
                    '_serialize' => 'anuncio'
                ]);
            }else{
                $this->response = $this->response->withStatus(422);
                $this->set([
                    'errors' => $anuncio->errors(),
                    '_serialize' => 'errors'
                ]);
            }
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Anuncio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $anuncio = $this->Anuncios->get($id);
        $deleted = $this->Anuncios->delete($anuncio);
        $this->set([
            'anuncio' => $anuncio,
            'deleted' => $deleted,
            '_serialize' => ['anuncio', 'deleted']
        ]);
    }
}
