<?php include 'incs/header.php'; ?>

<section id="home">

<div class="container col-xl-10 col-xxl-8 px-4 py-0">
    <div class="row align-items-center g-lg-5 py-5">
<?php echo (isset( $_SESSION['username'])) ? '<div class="col-lg-12 text-lg-start">' : '<div class="col-lg-7 text-lg-start">'; ?>
        <h1 class="display-4 fw-bold lh-1 mb-3">Hello<?php if(isset($userName)) { echo ' ' . $userName; } ?>.</h1>
        <p class="col-lg-10 fs-4">“I pictured myself in a Denver bar that night, with all the gang, and in their eyes I would be strange and ragged and like the Prophet who has walked across the land to bring the dark Word, and the only Word I had was 'Wow!”<br /><span class="attribution">&ndash; Jack Kerouac</span></p>
        <?php include 'incs/feedback.php'; ?>   
      </div>
      <div class="col-md-10 mx-auto col-lg-5" id="form-container">
        <form action="proc/signup.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light" id="signup-form">
         <div class="form-floating mb-3">
            <input type="name" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
          </div>                
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
            <label for="email">Email Address</label>
          </div>      
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
            <label for="pwd">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="pwdx2" name="pwdx2" placeholder="Confirm Password" required>
            <label for="pwdx2">Confirm Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
          <div class="text-center mt-3"><a href="#login" class="show-login">Log In</a></div>
          <hr class="my-3">
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
        </form>

        <form action="proc/login.php" method="post" class="p-4 p-md-5 border rounded-3 bg-light hide" id="login-form">
         <div class="form-floating mb-3">
            <input type="text" class="form-control" id="login" name="login" placeholder="Username/Email" required>
            <label for="login">Username/Email</label>
          </div>                  
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
            <label for="pwd">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Log In</button>
          <div class="text-center mt-3"><a href="#signup" class="show-signup">Sign Up</a></div>
          <hr class="my-3">
          <small class="text-muted">By clicking Log In, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>

</section>

<?php include 'incs/footer.php'; ?>