<?php
// src/Model/Entity/Course.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Proposition extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];

    
}