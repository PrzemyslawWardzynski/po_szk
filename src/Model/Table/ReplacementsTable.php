<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ReplacementsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');

        $this->belongsTo('Courses')
        ->setForeignKey('replacement_id');
    
        
    }
}