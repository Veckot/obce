<?= $this->extend('layout/sablona'); ?>
<?= $this->section("content"); ?>

<div class="container my-5">
    <h1 class="mb-4">Okres <?=$okres->nazev ?> Obce:</h1>
    
    <?php
    $table = new \CodeIgniter\View\Table();
    $headers = array('Poradi', 'Nazev', 'Funny Pocet');
    $table->setHeading($headers);
    $cislo = 0;

    
    // Loop through each "obec" object
    foreach ($mista as $key => $row) {
        $key++;
        $table->addRow(
            $key,
            $row->nazev,
            $row->pocet
        );
        
        
    }
    
 
    // Define Bootstrap Table Template
    $template = array(
        'table_open' => '<table class="table table-hover table-striped table-bordered">',
        'thead_open' => '<thead class="thead-dark">',
        'thead_close' => '</thead>',
        'heading_row_start' => '<tr>',
        'heading_row_end' => '</tr>',
        'heading_cell_start' => '<th scope="col">',
        'heading_cell_end' => '</th>',
        'tbody_open' => '<tbody>',
        'tbody_close' => '</tbody>',
        'row_start' => '<tr>',
        'row_end' => '</tr>',
        'cell_start' => '<td>',
        'cell_end' => '</td>',
        'table_close' => '</table>'
    );

    $table->setTemplate($template);

    echo $table->generate();
    ?>
</div>

<?= $this->endSection(); ?>
