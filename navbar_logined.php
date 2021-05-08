<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
   
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="index.php">
        Home
      </a>
      <a class="navbar-item" href="terms.php">
        Terms and Condition
      </a>
        <a class="navbar-item" href="report.php">
        Report an issue
        </a>
      </div>
    <div class="navbar-end">
    <div class="navbar-item"><figure class="image is-24x24"a href="message.php"><img src="message.jpg"></figure>
      <div class="navbar-item" ><a href="message.php"> <?php echo $_SESSION['login_user'];?></a>
        <div class="buttons">
          <a class="button is-dark" href="logout.php">
          <strong>Log out</strong>
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>