<?php
// src/Model/Table/CoursesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class SyllabusesTable extends Table
{
    public function initialize(array $config): void
    {
        $this->addBehavior('Timestamp');
        
        $this->hasMany('Courses');
        $this->belongsTo('Faculties');
    }
}