<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Navbar</a>
    <button class="navbar-toggler border-light bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(!Securite::verifAccessSession()) :?>
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="<?= URL ?>back/login">Login</a>
          </li>
        <?php else : ?>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?= URL ?>back/admin">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Familles
          </a>
          <ul class="dropdown-menu bg-secondary">
            <li><a class="dropdown-item text-dark" href="<?= URL ?>back/familles/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item text-dark" href="<?= URL ?>back/familles/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Animaux
          </a>
          <ul class="dropdown-menu bg-secondary">
            <li><a class="dropdown-item text-dark" href="<?= URL ?>back/animaux/visualisation">Visualisation</a></li>
            <li><a class="dropdown-item text-dark" href="<?= URL ?>back/animaux/creation">Création</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?= URL ?>back/deconnexion">Déconnexion</a>
        </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>