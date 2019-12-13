<?php
namespace App\Test\TestCase\Controller\V1;

use App\Controller\V1\AnunciosController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\V1\AnunciosController Test Case
 */
class AnunciosControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.anuncios',
        'app.imoveis',
        'app.status',
        'app.users',
        'app.tipos_negociacao',
        'app.anuncios_anuncios_tipos_negociacao'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
