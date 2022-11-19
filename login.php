<div class="container-login" id="container-login">
  <div class="form-container sign-up-container">
    <form action="#">
      <h1>Create Account</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your email for registration</span>
      <input type="text" placeholder="Name" />
      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />
      <button>Sign Up</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="" method="POST">
      <h1>Sign in</h1>
        <?php 
 
include 'koneksi.php';
include 'templates/template_login.php';
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: /perpus/");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: /perpus/");
    } else {
      echo '<div class="alert alert-danger" role="alert">
      Email atau password Anda salah. Silahkan coba lagi!
      </div>
      ';
    }
}
 
?>
      <input type="text" name="username" placeholder="Username" />
      <input style="margin-top:10px" type="password" name="password" placeholder="Password" />
      <button name="submit" style="margin-top:15px">Sign In</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
          <img style="height: 400px;" src="style/img/Logo_PU.png">
      </div>
    </div>
  </div>
</div>