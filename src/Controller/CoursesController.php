<?php
// src/Controller/CoursesController.php

namespace App\Controller;

class CoursesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $q = $this->request->getData('search');
        if($this->request->is('post')){
        $query = $this->Courses->find();
       

        $query->where(['nazwa_kursu LIKE \'%'.$q.'%\'
                        OR kod_kursu LIKE \'%'.$q.'%\' ']);
        $siema = $this->Courses->find('list'
        
        
        
        )->where(['nazwa_kursu LIKE \'%'.$q.'%\'
        OR kod_kursu LIKE \'%'.$q.'%\' ']);
      
        $this->set(compact('siema'));
    
        $courses = $this->Paginator->paginate($query);
        //$courses = $this->Paginator->paginate($this->Courses->findByNazwaKursu($q))
        }
        else{
            $courses = $this->Paginator->paginate($this->Courses->findByNazwaKursu('ABCDEFGHIJKL'));
        }
        $this->set(compact('courses'));
    }
}