<?php


namespace App\Controller;
use Cake\ORM\TableRegistry;

class PropositionsController extends AppController
{

 
    public function getcourses($query=null) {
        $this->autoRender = false;
        if ($this->request->is('post') && $this->request->is('ajax')) {
           
            $courses = $this->Propositions->Courses->find('all',['conditions'=>['id'=>$query]]);
            $courses =  $this->Propositions->Courses->find()->matching(
                'Syllabuses.Faculties', function ($q) {
                    return $q->where(['Faculties.id' > '0']);
                }
            );
            $courses->where(['name_c LIKE \'%'.$query.'%\'
                OR code LIKE \'%'.$query.'%\' ']); 
       
            
            echo json_encode($courses);
        }
      }

    public function index(){
        $courses =  $this->Propositions->Courses->find()->matching(
                'Syllabuses.Faculties', function ($q) {
                    return $q->where(['Faculties.id' > '0']);
                }
            );
        $this->set(compact('courses'));
            
        foreach($courses as $row){
            
            $donk[$row['id']] = $row['code'].";".
                $row['name_c'].";".
                $row["form"].";" .
                $row["ECTS"]." ECTS; j." .
                $row["_matchingData"]['Syllabuses']['study_language'].";" .
                $row["_matchingData"]['Syllabuses']['study_form'].";" .
                $row["_matchingData"]['Syllabuses']['degree']." stopień;" .
                $row["semester"]." semestr;" .
                $row["_matchingData"]['Syllabuses']['major'].";" .
                $row["_matchingData"]['Faculties']['symbol'];
                
        }

        $courses = $donk;
        $this->set(compact('courses'));
       
        if($this->request->is('post')){

            $data = $this->request->getData();
            $course_id = $data['course_id'];
            $replacement_id = $data['replacement_id'];
            $student_index = $data['student_index'];
            $error = 0;

            if($course_id == $replacement_id){
                $this->Flash->error(__('Wybrano te same kursy.'));
                $error = 1;
            }
            else{
                $existQuery = $this->Propositions->Courses->Replacements->find(null, array(
                    'conditions' => array('Replacements.course_id' => $course_id,'Replacements.replacement_id' => $replacement_id,)));
                
    
                if($existQuery->count() != 0){
                    $this->Flash->error(__('Ten zamiennik już istnieje w bazie.'));
                    $error = 1;
                }
                
                if($course_id > $replacement_id){
                    $dir = 'DESC';
                }
                else{
                    $dir = 'ASC';
                }
                $courses = $this->Propositions->Courses->find('all',['order' => ['Courses.id' => $dir ]])->matching(
                    'Syllabuses', function ($q) {
                        return $q->where(['Syllabuses.id' > '0']);
                    }
                );
                $courses->where(['Courses.id IN ('.$course_id.','.$replacement_id.')']);
               
                
                $coursesData = $courses->toArray();
                $courseData = $coursesData[0];
                $replacementData = $coursesData[1];
                
              
                if(intval($courseData['ECTS']) > intval($replacementData['ECTS'])){
                    $this->Flash->error(__('Zamiennik musi mieć równą lub większą ilość punktów ECTS.'));
                    $error = 1;
                }
    
                if(strcmp($courseData["_matchingData"]['Syllabuses']['study_language'],$replacementData["_matchingData"]['Syllabuses']['study_language']) != 0){
                    $this->Flash->error(__('Kursy mają różne języki.'));
                    $error = 1;
                }
                
                if(strcmp($courseData['form'],$replacementData['form']) != 0){
                    $this->Flash->error(__('Kursy mają różne formy kształcenia.'));
                    $error = 1;
                }
                
                if(intval($courseData["_matchingData"]['Syllabuses']['degree']) != intval($replacementData["_matchingData"]['Syllabuses']['degree'])){
                    $this->Flash->error(__('Kursy są z róznych poziomów studiów.'));
                    $error = 1;
                }
    
                if($error == 0){
    
                    
    
                    
                    $propositionsTable = TableRegistry::getTableLocator()->get('Propositions');
                    $proposition = $propositionsTable->newEntity($data);
                    $proposition->course_id = $course_id;
                    $proposition->replacement_id = $replacement_id;
                    $proposition->student_index = $student_index;
                    debug($proposition);
    
    
                    if ($this->Propositions->save($proposition)) {
                        $this->Flash->success(__('Twoja propozycja została zapisana.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    else{
                        $this->Flash->error(__('Nie udało się zapisać twojej propozycji.'));
                    }
                }
            }

            
        }
            
            

            



    }
















    




}