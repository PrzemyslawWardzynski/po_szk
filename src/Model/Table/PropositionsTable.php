<?php
// src/Model/Table/CoursesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class PropositionsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Courses')
        ->setForeignKey('replacement_id');

    }
}