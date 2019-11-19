<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrantTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrantTypesTable Test Case
 */
class GrantTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GrantTypesTable
     */
    public $GrantTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GrantTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GrantTypes') ? [] : ['className' => GrantTypesTable::class];
        $this->GrantTypes = TableRegistry::getTableLocator()->get('GrantTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GrantTypes);

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
