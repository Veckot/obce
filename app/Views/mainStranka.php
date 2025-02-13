<?= $this->extend('layout/sablona'); ?>
<?= $this->section("content"); ?>

<div class="container my-5">
    <h1 class="mb-4">Kraj Obce:</h1>

    <class="mb-3">
        <strong>show:</strong>
        <?php for ($i = 10; $i <= 1000; $i += 10): ?>
            <a href="?perPage=<?= $i ?>" class="btn btn-primary btn-sm <?= ($perPage == $i) ? 'active' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>
    </div>

    <?php
    $table = new \CodeIgniter\View\Table();
    $headers = array('Poradi', 'Nazev', 'Funny Pocet');
    $table->setHeading($headers);

    // Loop through each "obec" object
    foreach ($mista as $key => $row) {
        $table->addRow(
            $pager->getCurrentPage() * $perPage - $perPage + $key + 1,
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

    // Pagination Links
    echo $pager->makeLinks($pager->getCurrentPage(), $perPage, $pager->getTotal());
    ?>

</div>

<?= $this->endSection(); ?>
