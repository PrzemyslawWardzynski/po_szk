<?php use Cake\Routing\Router; ?>
<h2>Utwórz propozycję zamiennika</h2>
<div class ="rowflex">
<div class = "colflex">
<h2>Kurs bazowy</h2>
<?php
    echo $this->Form->create(null ,['type' => 'post']);

    echo $this->Form->control('search', [
        'label' => 'Wpisz nazwę lub kod kursu (bazowego)'
    ]);
    echo $this->Form->button(__('Szukaj'),['type' => 'button','id'=>'searchButton','onclick' => 'dynSearch()']);
  

    echo $this->Form->control('course_id', ['id'=>'course','label' => '', 'options' => $courses, 'empty' => 'Wyszukaj i wybierz kurs','required' => 'true']);
 ?></div>
<div class = "colflex">
<h2>Zamiennik</h2>
<?php echo $this->Form->control('search2', [
        'label' => 'Wpisz nazwę lub kod kursu (zamiennika)'
    ]);
    echo $this->Form->button(__('Szukaj'),['type' => 'button','id'=>'searchButton2','onclick' => 'dynSearch2()']);
   
    echo $this->Form->control('replacement_id', ['id'=>'course2','label' => '', 'options' => $courses, 'empty' => 'Wyszukaj i wybierz kurs','required' => 'true']);
    ?> </div> 
</div>
<div class = "padflex">
    <?php echo $this->Form->control('student_index', ['label' => 'Wpisz swój indeks studenta*','type' => 'number', 'required' => 'true', 'min' => '100000', 'max' => '999999']); ?>


<?php echo $this->Form->button(__('Zgłoś'));

    echo $this->Form->end();
?>
</div>




<script>


function dynSearch()  {
    var query = $('#search').val();
   $.ajax({
     dataType: "json",
     type: "POST",
     evalScripts: true,
     async:true,
     headers: { 'X-CSRF-Token': $('[name="_csrfToken"]').val() },
     url: '<?php echo Router::url(array('controller'=>'propositions','action'=>'getcourses'));?>' +'/'+query,
      success: function(data){
        $("#course").find('option').remove();
        for (var key in data) {
          
     if (data.hasOwnProperty(key)) {
      $('#course').append('<option value="'+ data[key]["id"] +'">'+
                data[key]["code"]+";" + 
                data[key]["name_c"]+";" +
                data[key]["form"]+";" +
                data[key]["ECTS"]+" ECTS; j." +
                data[key]["_matchingData"]['Syllabuses']['study_language']+";" +
                data[key]["_matchingData"]['Syllabuses']['study_form']+";" +
                data[key]["_matchingData"]['Syllabuses']['degree']+" stopień;" +
                data[key]["semester"]+" semestr;" +
                data[key]["_matchingData"]['Syllabuses']['major']+";" +
                data[key]["_matchingData"]['Faculties']['symbol']+
                '</option>');
       } }
        
    
      },
       error: function(e) {
        alert("Błąd pobierania kursów!");
         }
     });
};

function dynSearch2()  {
    var query = $('#search2').val();
   $.ajax({
     dataType: "json",
     type: "POST",
     evalScripts: true,
     async:true,
     headers: { 'X-CSRF-Token': $('[name="_csrfToken"]').val() },
     url: '<?php echo Router::url(array('controller'=>'propositions','action'=>'getcourses'));?>' +'/'+query,
      success: function(data){
        $("#course2").find('option').remove();
        for (var key in data) {
          
     if (data.hasOwnProperty(key)) {
      $('#course2').append('<option value="'+ data[key]["id"] +'">'+
                data[key]["code"]+";" + 
                data[key]["name_c"]+";" +
                data[key]["form"]+";" +
                data[key]["ECTS"]+" ECTS; j." +
                data[key]["_matchingData"]['Syllabuses']['study_language']+";" +
                data[key]["_matchingData"]['Syllabuses']['study_form']+";" +
                data[key]["_matchingData"]['Syllabuses']['degree']+" stopień;" +
                data[key]["semester"]+" semestr;" +
                data[key]["_matchingData"]['Syllabuses']['major']+";" +
                data[key]["_matchingData"]['Faculties']['symbol']+
                '</option>');
       } }
        
    
      },
       error: function(e) {
        alert("Błąd pobierania kursów!");
         }
     });
};





 </script>