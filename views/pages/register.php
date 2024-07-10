<div class="container">
  <h2 class="text-center">Registrati</h2>
  <?php
  if(isset($_SESSION['success_message'])){
    echo "<div class='text-center my-5'><h4 class='text-success'>" . $_SESSION['success_message'] . "</h4></div>";
    unset($_SESSION['success_message']);
  }
  
  if(!empty($errors)){
    echo "<div class='text-center mb-3'><h4 class='text-danger'>";
    foreach($errors as $error){
      echo "<p>$error</p>";
    }
    echo "</div>";
  }
  ?>


  <form action="" method="POST">
    <!-- Nome utente -->
    <div class="my-3">
      <label for="username" class="form-lable">Nome Utente</label>
      <input
        type="text"
        class="form-control"
        id="username"
        name="username"
        required
        minlength="3"
        maxlength="20"
        >
    </div>

    <!-- Errori username-->
    <?php if (isset($errors['username'])): ?>
      <span class="text-danger mb-3"><?php echo $errors['username']; ?></span><br>
    <?php endif; ?>
    <!-- /Errori username-->
    <!-- /Nome utente -->
    <!-- email -->
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input
        type="email"
        class="form-control"
        id="email"
        placeholder="tuaemail@email.com"
        name="email"
        required
        >
    </div>
    <!-- Errori email-->
    <?php if (isset($errors['email'])): ?>
      <span class="text-danger mb-3"><?php echo $errors['email']; ?></span><br>
    <?php endif; ?>
    <!-- /Errori email-->
    <!-- /email -->
    <!-- password -->
    <div class="mb-3">
      <label for="password" class="form-label">password</label>
      <input
      type="password"
      class="form-control"
      id="password"
      placeholder="*******"
      name="password"
      required
      minlength="6"
      maxlength="16"
      >
    </div>
    <!-- Errori password-->
    <?php if (isset($errors['password'])): ?>
      <span class="text-danger mb-3"><?php echo $errors['password']; ?></span><br>
    <?php endif; ?>
    <!-- /Errori password-->
    <!-- /password -->
    <!-- Confirm password -->
    <div class="mb-3">
      <label for="confPassword" class="form-label">Conferma la password</label>
      <input
      type="password"
      class="form-control"
      id="confPassword"
      placeholder="*******"
      name="confPassword"
      required
      minlength="6"
      maxlength="16"
      >
    </div>
    <!-- Errori confPassword-->
    <?php if (isset($errors['confPassword'])): ?>
      <span class="text-danger mb-3"><?php echo $errors['confPassword']; ?></span><br>
    <?php endif; ?>
    <!-- /Errori confPassword-->
    <!-- /Confirm password -->

    <!-- btn -->
    <div class="mb-3">
      <button class="btn btn-primary" type="submit">
        Registrati
      </button>
    </div>
    <!-- /btn -->
  </form>
</div>
