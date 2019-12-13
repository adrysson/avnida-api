<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImoveisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImoveisTable Test Case
 */
class ImoveisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImoveisTable
     */
    public $Imoveis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.imoveis',
        'app.enderecos',
        'app.imagens',
        'app.imoveis_tipos',
        'app.imoveis_acessos',
        'app.imoveis_diferenciais',
        'app.imoveis_itens_inclusos',
        'app.imoveis_itens_seguranca'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Imoveis') ? [] : ['className' => ImoveisTable::class];
        $this->Imoveis = TableRegistry::getTableLocator()->get('Imoveis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Imoveis);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
