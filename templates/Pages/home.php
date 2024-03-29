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
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'SZK - system zamiany kursów';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('milligram.min.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('Home.css') ?>
    <?= $this->Html->css('flex.css') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="/app"><span>SZK -</span> system zamiany kursów</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" href="https://localhost/app/courses/">Przeglądaj zamienniki</a>
            <a target="_blank" href="https://localhost/app/propositions/">Zgłoś propozycję</a>
        </div>
    </nav>
    <main class="main">
        <div class="container">
        <div class="container text-center">
            
           
            <h1>
                Witaj w SZK - systemie zamiany kursów!
            </h1>
            <ul>Menu
                <li><a target="_blank" href="https://localhost/app/courses/">Przeglądaj zamienniki</a><li>
                <li><a target="_blank" href="https://localhost/app/propositions/">Zgłoś propozycję</a><li>




            </ul>
        </div>
        </div>
    </main>
</body>
</html>
