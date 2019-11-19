<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RpsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RpsTable Test Case
 */
class RpsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RpsTable
     */
    public $Rps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Rps',
        'app.RpsGranttypes',
        'app.ResponseTypes',
        'app.Scopes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rps') ? [] : ['className' => RpsTable::class];
        $this->Rps = TableRegistry::getTableLocator()->get('Rps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rps);

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
}
