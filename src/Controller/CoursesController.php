<?php
// src/Controller/CoursesController.php

namespace App\Controller;

class CoursesController extends AppController
{
    



    public function index()
    {
        $this->loadComponent('Paginator');
        
        if($this->request->is('post')){
        
            $q = $this->request->getData('search');

                       
            $courses =  $this->Courses->find()->matching(
                'Syllabuses.Faculties', function ($q) {
                    return $q->where(['Faculties.id' > '0']);
                }
            );
            $courses->where(['name_c LIKE \'%'.$q.'%\'
                OR code LIKE \'%'.$q.'%\' ']); 
            $courses = $this->Paginator->paginate($courses);

    
          
   
        }
        else{
            $courses = $this->Paginator->paginate($this->Courses->findByNameC('ABCDEFGHIJKL'));
           
            $courses =  $this->Courses->find()->matching(
                'Syllabuses.Faculties', function ($q) {
                    return $q->where(['Faculties.id' > '0']);
                }
            );
            $courses = $this->Paginator->paginate($courses);
            
        }
        $this->set(compact('courses'));
       
    }


    public function view($id = null)
    {

        $this->loadComponent('Paginator');
        
      

        $return = $this->referer();
        $this->set(compact('return'));


        $replacements = $this->Courses->Replacements->find();
        $filter = ['course_id =' => $id];

        $replacements->matching('Courses.Syllabuses.Faculties', function ($q) use ($filter) {
            return $q->where($filter);
        });

        
        $replacements = $this->Paginator->paginate($replacements);
        
        
        $this->set(compact('replacements'));





    }












}