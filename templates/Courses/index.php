
<h1>Search</h1>
<?php
    echo $this->Form->create();

    echo $this->Form->control('search', [
        'label' => 'Wpisz nazwę lub kod kursu'
    ]);
    echo $this->Form->button(__('Szukaj'));
    echo $this->Form->end();

    echo $this->Form->input('course', array('label'=>false, 
               'div'=>false, 
               'type'=>'select', 
               'empty'=>'Wybierz kurs', 
               'options'=>$siema));
    
?>










<h1>Courses</h1>
<table>
    <tr>
        <th>Kod kursu</th>
        <th>Forma kursu</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($courses as $course): ?>
    <tr>
        <td>
            <?= $this->Html->link($course->kod_kursu, ['action' => 'view', $course->slug]) ?>
        </td>
        <td>
            <?= $course->nazwa_kursu ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>