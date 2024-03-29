<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['display','list','listcsv']);
    }
    
    public function isAuthorized()
    {
      // Admin can access every action
      if ($this->Auth->user('status') === 'admin') {
          return true;
      } 
      if (in_array($this->request->getParam('action'), ['index','logout','login','rps','api'])) {
        return true;
      }

    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        $this->loadComponent('Auth', [
          'authorize' => ['Controller'],
          'loginRedirect' => array('controller' => 'rps','action' => 'index'),
          'logoutRedirect' => array('controller' => 'pages','action' => 'display','home'),
          'authenticate' => [
            'Muffin/OAuth2.OAuth' => [
              'providers' => [
                'generic' => [
                  'className' => 'League\OAuth2\Client\Provider\GenericProvider',
                  // all options defined here are passed to the provider's constructor
                  'options' => [
                    'clientId' => 'ResourceRegistry', 
                    'clientSecret' => Configure::read('client_secret'),
                    'scopes' => 'openid info profile email address phone csc_user',
                    'redirectUri' => Configure::read('redirect_url').'oauth/generic',
                    'urlAuthorize' => Configure::read('auth_url').'idp/profile/oidc/authorize',
                    'urlAccessToken' => Configure::read('auth_url').'idp/profile/oidc/token',
                    'urlResourceOwnerDetails' => Configure::read('auth_url').'idp/profile/oidc/userinfo'
                  ],
                  'mapFields' => [
                    'family_name' => 'family_name', // maps the app's username to github's login
                    'given_name' => 'given_name',
                    'email' => 'email',
                    'eppn' => 'eppn',
                    'username' => 'uid'
                  ],
                  // ... add here the usual AuthComponent configuration if needed like fields, etc.
                ],
              ],
            ],
          ],
        ]);
    }

}
