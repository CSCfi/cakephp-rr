<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GranttypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GranttypesTable Test Case
 */
class GranttypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GranttypesTable
     */
    public $Granttypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Granttypes',
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
        $config = TableRegistry::getTableLocator()->exists('Granttypes') ? [] : ['className' => GranttypesTable::class];
        $this->Granttypes = TableRegistry::getTableLocator()->get('Granttypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Granttypes);

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
