<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TokenEndpointAuthenticationMethodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TokenEndpointAuthenticationMethodsTable Test Case
 */
class TokenEndpointAuthenticationMethodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TokenEndpointAuthenticationMethodsTable
     */
    public $TokenEndpointAuthenticationMethods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TokenEndpointAuthenticationMethods',
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
        $config = TableRegistry::getTableLocator()->exists('TokenEndpointAuthenticationMethods') ? [] : ['className' => TokenEndpointAuthenticationMethodsTable::class];
        $this->TokenEndpointAuthenticationMethods = TableRegistry::getTableLocator()->get('TokenEndpointAuthenticationMethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TokenEndpointAuthenticationMethods);

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
