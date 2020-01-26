
<h2>Przeglądanie zamienników</h2>
<?php
    echo $this->Form->create();

    echo $this->Form->control('search', [
        'label' => 'Wpisz nazwę lub kod kursu'
    ]);
    echo $this->Form->button(__('Szukaj'));
    ?>

<?php
    echo $this->Form->end();
?>











<h2>Kursy</h2>
<table>
    <tr>
        <th>Kod kursu</th>
        <th>Nazwa kursu</th>
        <th>Forma kursu</th>
        <th>ECTS</th>
        <th>Język</th>
        <th>Forma studiów</th>
        <th>Stopień studiów</th>
        <th>Semestr</th>
        <th>Kierunek</th>
        <th>Wydział</th>
    </tr>

    

    <?php foreach ($courses as $course): ?>
    <tr>
        <td>
        <?= $this->Html->link($course->code, ['action' => 'view', $course->id],['class' => 'r']) ?>
        </td>
        <td>
            <?= $course->name_c ?>
        </td>
        <td>
            <?= $course->form ?>
        </td>
        <td>
            <?= $course->ECTS ?>
        </td>
        <td>
            <?= $course->_matchingData['Syllabuses']->study_language ?>
        </td>
        <td>
            <?= $course->_matchingData['Syllabuses']->study_form ?>
        </td>
        <td>
            <?= $course->_matchingData['Syllabuses']->degree ?>
        </td>
        <td>
            <?= $course->semester?>
        </td>
        <td>
            <?= $course->_matchingData['Syllabuses']->major ?>
        </td>
        <td>
            <?= $course->_matchingData['Faculties']->symbol ?>
        </td>
        
    </tr>
    <?php endforeach; ?>
</table>