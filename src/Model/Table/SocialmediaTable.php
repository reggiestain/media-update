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
// src/Model/Table/UsersTable.php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\Rule\IsUnique;

class SocialmediaTable extends Table {

    public function initialize(array $config) {

        $this->table('socialmedia');
        $this->addBehavior('Timestamp');
        // Just add the belongsTo relation with CategoriesTable
        //$this->primaryKey('profile_id');       

        /*
          $this->addAssociations([
          'belongsTo' => [
          'Contacts' => ['className' => 'App\Model\Table\ContactsTable']
          ],

          ]);
         * 
         */
    }

    public function validationDefault(Validator $validator) {
        $validator->notEmpty('socialmedia_type', 'First name is required.')
                  ->notEmpty('app_id', 'app_id is required.')
                  ->notEmpty('app_secret', 'app_secret is required.');
                
        return $validator;
    }

}
