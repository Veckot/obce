<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand Name -->
        <a class="navbar-brand fw-bold text-primary" href="#">Obci Nigerie</a>

        <!-- Navbar Toggler (for Mobile View) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php foreach ($kraj as $navitem): ?>
                    <li class="nav-item">
                        <?= anchor("station_dataStranka/" . $navitem->kod, $navitem->nazev, ['class' => 'nav-link text-dark fw-semibold']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
