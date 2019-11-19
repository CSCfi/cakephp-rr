<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponseTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponseTypesTable Test Case
 */
class ResponseTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponseTypesTable
     */
    public $ResponseTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ResponseTypes',
        'app.Rps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ResponseTypes') ? [] : ['className' => ResponseTypesTable::class];
        $this->ResponseTypes = TableRegistry::getTableLocator()->get('ResponseTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResponseTypes);

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
