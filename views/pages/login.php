<?php

?>


<div class="container">
  <h2 class="text-center">Login</h2>

  <?php 
    // session_start();
    if(isset($_SESSION['error'])){
      echo "<div class='text-center text-danger'>" . $_SESSION['error'] . "</div>";
      unset($_SESSION['error']);
    }
  ?>

  <form action="" method="POST">
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
    <!-- /password -->

    <!-- btn -->
    <div class="mb-3">
      <button class="btn btn-primary">
        Collegati
      </button>
    </div>
    <!-- /btn -->
  </form>
</div>