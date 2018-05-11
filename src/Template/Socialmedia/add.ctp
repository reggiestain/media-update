<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Social Media</strong><small> Form</small></div>
        <div class="card-body card-block">
            <div class=form-group">
                <label for="select" class=" form-control-label">Select</label>              
                    <select name="select" id="select" class="form-control">
                        <option value="0">Please account type</option>
                        <option value="1">Facebook</option>
                        <option value="2">LinkIn</option>
                        <option value="3">Twitter</option>
                    </select>              
            </div><br>
            <div class="form-group">
                <label for="app-id" class=" form-control-label">App-Id</label>
                <input type="text" id="app-id" placeholder="Enter your app-id" class="form-control">
            </div>
            <div class="form-group">
                <label for="vat" class=" form-control-label">App-Secret</label>
                <input type="text" id="vat" placeholder="Enter your app-secret" class="form-control">
            </div>
       </div>      
    </div>
</div>
