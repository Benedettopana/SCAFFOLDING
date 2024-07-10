<?php 

require_once __DIR__ . "/../../data/conn.php";

// apro la sessione solo se non è già aperta
if(session_status() === PHP_SESSION_NONE){
  session_start();
}

// Per rendere visibili o non visibili i link
$logged = false;
if(isset($_SESSION['userID'])){
  $logged = true;
}

// var_dump($scheme);
// var_dump($host);
function getHref($uri){
  $scheme = $_SERVER['REQUEST_SCHEME'];
  $host = $_SERVER['HTTP_HOST'];
  echo "$scheme://$host/php/$uri";
}


?>

<body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <?php if($logged): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php getHref('php-login-register/private.php') ?>">Pagina Privata</a>
            </li>
            <?php endif; ?>

            <?php if(!$logged): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php getHref('php-login-register/login.php') ?>">Login</a>
            </li>
            <?php endif; ?>

            <?php if(!$logged): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php getHref('php-login-register/register.php') ?>">Registrati</a>
            </li>
            <?php endif; ?>
            
            <?php if($logged): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php getHref('php-login-register/logout.php') ?>">Logout</a>
            </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>