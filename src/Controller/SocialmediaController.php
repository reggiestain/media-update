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
class SocialmediaController extends AppController {

    
    public $name;
    public $url;
    public $key;

    public function beforeFilter(\Cake\Event\Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['signup']);
        $this->UsersTable = TableRegistry::get('users');
        $this->ProfilesTable = TableRegistry::get('profiles');
        $this->ContactTypeTable = TableRegistry::get('contact_type');
        $this->username = $this->Auth->user('username');
        $this->viewBuilder()->layout('dashboard');
    }

    public function add() {
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
            
    }

    /**
     * 
     * @param type $id
     */
    public function view() {
        /*
        $Profile = $this->get_profile($id);
        $ContactType = $this->ContactTypeTable->find('list');
        $this->set('ContactType', $ContactType);
        $this->set('Profile', $Profile);
        $this->viewBuilder()->layout(false);
         * 
         */
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
                    'confirm_pass' => $this->request->data('confirm_pass'),'contact_type_id' => $this->request->data('contact_type_id'), 'date_of_birth' => $this->request->data('date_of_birth'), 'user_id' => $this->Auth->user('id')];
                $Profile = $this->ProfilesTable->patchEntity($Prof,$ProfileData);
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
