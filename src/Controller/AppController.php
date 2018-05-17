<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Facebook\Facebook as fb;
use Cake\Http\Client;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public $UsersTable;
    public $ProfilesTable;
    public $LanguagesTable;
    public $Datetime;
    private $SocialmediaTable;

    public function initialize() {

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        $this->loadComponent('Cookie');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Basic',
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'dashboard'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
    }

    private function fb_config() {
        $fb = new fb([
            'app_id' => '358041774602493',
            'app_secret' => '242cb6f60604ea9332fc28f754d32090',
            'default_graph_version' => 'v2.10',
                //'default_access_token' => $appId|$appSecret
        ]);

        return $fb;
    }

    protected function fb_login() {
        $fb = $this->fb_config();
        $helper = $fb->getRedirectLoginHelper();
        //$permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('https://siyanontech.co.za/users/login');

        return $loginUrl;
    }

    protected function fb_callback() {
        $fb = $this->fb_config();
        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            return 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            return 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                return 'Bad request';
            }
        }
    }

    public function rest_api($appId, $appSecret, $accessToken) {
        $fb = $this->fb_config($appId, $appSecret, $accessToken);
        $token = $fb->getApp()->getAccessToken();
        $http = new Client();
        $response = $http->get('https://graph.facebook.com/v2.11/' . $token . '/photos', [
            'auth' => ['app_id' => $appId, 'app_secret' => $appSecret]
        ]);
        return $response;
    }

}
