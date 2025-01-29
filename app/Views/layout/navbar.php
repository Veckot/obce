<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
          <a class="navbar-brand">Obci Nigerie</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <?php
                $nav = array(
                    'class' => 'nav-link'
                );
            ?>
            <?php foreach ($kraj as $navitem):?>
                <link><?= anchor("station_dataStranka/" . $navitem->kod, $navitem->nazev); ?></link><h1>&nbsp;</h1>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
</nav>