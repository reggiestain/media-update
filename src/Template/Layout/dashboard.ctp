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

//$cakeDescription = 'CakePHP: the rapid development php framework';

$cakeDescription = '';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title;?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sufee Admin - HTML5 Admin Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Bootstrap -->
        <?php echo $this->Html->css('normalize.css') ;?>
        <?php echo $this->Html->css('bootstrap.min.css');?>
        <?php echo $this->Html->css('font-awesome.min.css');?>
        <?php //echo $this->Html->css('cake-style.css') ;?>                  
        <!-- Bootstrap Admin Theme -->
        <?php echo $this->Html->css('themify-icons.css') ;?>
        <?php echo $this->Html->css('flag-icon.min.css');?>       
        <?php echo $this->Html->css('cs-skin-elastic.css');?>
        <?php echo $this->Html->css('scss/style.css');?>
        <?php echo $this->Html->css('lib/vector-map/jqvmap.min.css');?>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <!-- Custom styles -->        
    </head>
    <body>
        <!-- Right Panel -->
        
       <?php echo $this->element('sidebar');?>
        <div id="right-panel" class="right-panel">
       <?php echo $this->element('header');?>
       <?php echo $this->fetch('content');?>
        </div>
        <!-- /#right-panel -->
       <?php //echo $this->element('footer');?>
        <?php echo $this->Html->script('vendor/jquery-2.1.4.min');?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <?php echo $this->Html->script('plugins');?>
        <?php echo $this->Html->script('main');?>       

        <?php echo $this->Html->script('lib/chart-js/Chart.bundle');?>   
        <?php echo $this->Html->script('dashboard.js');?> 
        <?php echo $this->Html->script('widgets');?>  
        <?php echo $this->Html->script('lib/vector-map/jquery.vmap');?> 
        <?php echo $this->Html->script('lib/vector-map/jquery.vmap.min');?>  
        <?php echo $this->Html->script('lib/vector-map/jquery.vmap.sampledata');?>
        <?php echo $this->Html->script('lib/vector-map/country/jquery.vmap.world');?>
        <script>
            (function ($) {
                "use strict";

                jQuery('#vmap').vectorMap({
                    map: 'world_en',
                    backgroundColor: null,
                    color: '#ffffff',
                    hoverOpacity: 0.7,
                    selectedColor: '#1de9b6',
                    enableZoom: true,
                    showTooltip: true,
                    values: sample_data,
                    scaleColors: ['#1de9b6', '#03a9f5'],
                    normalizeFunction: 'polynomial'
                });
            })(jQuery);
        </script>

    </body>
</html>
