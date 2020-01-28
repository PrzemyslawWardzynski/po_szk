<?php
// src/Model/Table/CoursesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class CoursesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        $this->setDisplayField(['code','name_c']);
      
        $this->belongsTo('Syllabuses');

        $this->hasMany('Replacements', [
            'className' => 'Replacements'
        ])
        ->setForeignKey('course_id')
        ->setProperty('base');

        
        $this->hasMany('Replacements', [
            'className' => 'Replacements'
        ])
        ->setForeignKey('replacement_id')
        ->setProperty('replace');


        $this->hasMany('Propositions', [
            'className' => 'Propositions'
        ])
        ->setForeignKey('course_id')
        ->setProperty('base_p');

        
        $this->hasMany('Propositions', [
            'className' => 'Propositions'
        ])
        ->setForeignKey('replacement_id')
        ->setProperty('replace_p');
    }
}