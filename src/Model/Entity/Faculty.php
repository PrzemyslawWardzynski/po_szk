<?php
// src/Model/Entity/Course.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Faculty extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];

    
}