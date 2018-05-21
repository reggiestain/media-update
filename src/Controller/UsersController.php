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

use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Request;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController {

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     * 
     */
    public $username;
    public $email;
    public $userId;

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['signup']);
        $this->UsersTable = TableRegistry::get('users');
        $this->ProfilesTable = TableRegistry::get('profiles');
        $this->SocialmediaTable = TableRegistry::get('socialmedia');
        $this->username = $this->Auth->user('username');
        $this->userId = $this->Auth->user('id');
    }

    /**
     * 
     * @return type
     */
    public function login() {
        $user = $this->UsersTable->newEntity($this->request->data);

        $fb = $this->fb_config();
        $helper = $fb->getRedirectLoginHelper();
        $accessToken = $helper->getAccessToken();

        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            // Logged in
            echo '<h3>Access Token</h3>';
            var_dump($accessToken->getValue());
        }
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('Welcome , ' . $this->Auth->user('email')));
                return $this->redirect(['action' => 'dashboard']);
            }
            $this->Flash->error(__('Invalid email or password.'));
        }
        $this->set('users', $user);
        $this->set('title', 'Login');
        $this->set('fb_login', $this->fb_log());
        $this->set('fbuser', $fbuser);
    }

    public function policy() {
        
    }

    public function dashboard() {

        $fbConfig = $this->SocialmediaTable->find()->where(['socialmedia_type_id' => 1, 'user_id' => $this->userId])->first();

        $response = $this->fb_acc($fbConfig->app_id, $fbConfig->app_secret);
        var_dump($response->getUser());
        exit();
        $response = $this->fb_config($fbConfig->app_id, $fbConfig->app_secret);
        $me = $response->getGraphEdge();
        var_dump($me->id());
        //echo 'Logged in as ' . $me->getName();
        exit();
        $Profile = $this->ProfilesTable->find()->where(['user_id' => $this->Auth->user('id')])->contain(['ContactType']);
        $profile = $this->ProfilesTable->newEntity();
        $contactType = $this->ContactTypeTable->find('list');
        $id = $this->Auth->user('id');
        $this->set("id", $id);
        $this->set('profile', $profile);
        $this->set('contactType', $contactType);
        $this->set('username', $this->username);
        $this->set('Profile', $Profile);
        $this->set('title', 'Dashboard');
        $this->viewBuilder()->layout('dashboard');
    }

    public function add() {
        if ($this->request->is('ajax')) {
            $ProfileEntity = $this->ProfilesTable->newEntity();
            $ProfileData = ['firstname' => $this->request->data('firstname'), 'surname' => $this->request->data('surname'), 'mobile' => $this->request->data('mobile'), 'email' => $this->request->data('email'), 'password' => $this->request->data('password'),
                'confirm_pass' => $this->request->data('confirm_pass'), 'contact_type_id' => $this->request->data('contact_type_id'), 'date_of_birth' => $this->request->data('date_of_birth'), 'user_id' => $this->Auth->user('id')];
            $Profile = $this->ProfilesTable->patchEntity($ProfileEntity, $ProfileData);
            if (empty($Profile->errors())) {
                $this->ProfilesTable->save($Profile);
                $status = '200';
                $message = '';
            } else {
                $error_msg = [];
                foreach ($Profile->errors() as $errors) {
                    if (is_array($errors)) {
                        foreach ($errors as $error) {
                            $error_msg[] = $error;
                        }
                    } else {
                        $error_msg[] = $errors;
                    }
                }
                $status = 'error';
                $message = $error_msg;
            }
            $this->set("status", $status);
            $this->set("message", $message);
            $this->set('_serialize', ['status', 'message']);
            $this->viewBuilder()->layout(false);
        }
    }

    /**
     * 
     * @param type $id
     */
    public function view($id) {
        $Profile = $this->get_profile($id);
        $ContactType = $this->ContactTypeTable->find('list');
        $this->set('ContactType', $ContactType);
        $this->set('Profile', $Profile);
        $this->viewBuilder()->layout(false);
    }

    /**
     * 
     * @param type $id
     */
    public function edit($id) {
        $Profile = $this->get_profile($id);
        $ContactType = $this->ContactTypeTable->find('list');
        $this->set('ContactType', $ContactType);
        $this->set('Profile', $Profile);
        $this->viewBuilder()->layout(false);
    }

    /**
     * 
     * @param type $id
     */
    public function update($id) {
        if ($this->request->is('ajax')) {
            $Prof = $this->ProfilesTable->get($id);
            if ($this->request->is(['post', 'put'])) {
                $ProfileData = ['firstname' => $this->request->data('firstname'), 'surname' => $this->request->data('surname'), 'mobile' => $this->request->data('mobile'), 'email' => $this->request->data('email'), 'password' => $this->request->data('password'),
                    'confirm_pass' => $this->request->data('confirm_pass'), 'contact_type_id' => $this->request->data('contact_type_id'), 'date_of_birth' => $this->request->data('date_of_birth'), 'user_id' => $this->Auth->user('id')];
                $Profile = $this->ProfilesTable->patchEntity($Prof, $ProfileData);
                if (empty($Profile->errors())) {
                    $this->ProfilesTable->save($Profile);
                    $status = '200';
                    $message = '';
                } else {
                    $error_msg = [];
                    foreach ($Profile->errors() as $errors) {
                        if (is_array($errors)) {
                            foreach ($errors as $error) {
                                $error_msg[] = $error;
                            }
                        } else {
                            $error_msg[] = $errors;
                        }
                    }
                    $status = 'error';
                    $message = $error_msg;
                }
                $this->set("status", $status);
                $this->set("message", $message);
                $this->set('_serialize', ['status', 'message']);
                $this->viewBuilder()->layout(false);
            }
        }
    }

    public function logout() {
        $this->set('title', 'Login');
        return $this->redirect($this->Auth->logout());
    }

}
