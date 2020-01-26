
<h2>Zamienniki</h2>
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



    <?php foreach ($replacements as $replacement): ?>
    <tr>
        <td>
        <?= $replacement->_matchingData['Courses']->code ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Courses']->name_c ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Courses']->form ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Courses']->ECTS ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Syllabuses']->study_language ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Syllabuses']->study_form ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Syllabuses']->degree ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Courses']->semester?>
        </td>
        <td>
            <?= $replacement->_matchingData['Syllabuses']->major ?>
        </td>
        <td>
            <?= $replacement->_matchingData['Faculties']->symbol ?>
        </td>
        
    </tr>
    <?php endforeach; ?>
</table>
<br>
<?= $this->Html->link(__('Powrót'), $this->request->referer(),['class' => 'r']) ?>

