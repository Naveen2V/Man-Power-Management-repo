<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!--alert message -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <title>HR Login</title>
</head>
<style>
body {
  background-color: rgb(230, 230, 230);
}

/* body{
    background: #222 url('https://unsplash.it/1920/1080/?random') center center no-repeat;
  } */
#cover {
  background-size: cover;
  height: 100%;
  text-align: center;
  display: flex;
  align-items: center;
  position: relative;
}

#cover-caption {
  width: 100%;
  position: relative;
  z-index: 1;
}

form:before {
  content: '';
  height: 100%;
  left: 0;
  position: absolute;
  top: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.3);
  z-index: -1;
  border-radius: 10px;
}
</style>

<body>
  <div style="background-color: black;">
    <img src="vguard-logo.jpg" alt="vguard" style="opacity: 1;">
  </div>
  <section id="cover" class="min-vh-100">
    <div id="cover-caption">
      <div class="container">
        <div class="row text-white">
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <h1 class="display-4 py-2 text-truncate"
              style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">HR Login</h1>
            <div class="px-2">
              <form action="index.php" class="justify-content-center" method="POST">
                <div class="form-group">
                  <div class="input-group input-focus">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-white">
                        <i class="bi bi-person-circle"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" name="HRID" placeholder="User Name">
                  </div>
                </div>
                <div class="input-group input-focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white">
                      <i class="bi bi-lock-fill"></i>
                    </span>
                  </div>
                  <input type="password" name="pwd" class="form-control" placeholder="Password"
                    autocomplete="current-password" id="id_password">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-white">
                      <i class="bi bi-eye-fill" id="togglePassword" style="cursor: pointer;"></i>
                    </span>
                  </div>
                </div><br>

                <?php
                session_start();
                if (isset($_GET['ee'])) {
                  $_SESSION['userL'] = null;
                }
                if (isset($_POST['Login'])) {
                  if ($_POST['HRID'] == '' or $_POST['pwd'] == '') {
                    echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <b>Please fill Username and password!</b>
          </div>';
                  } else {
                    $U = $_POST['HRID'];
                    $P = $_POST['pwd'];
                    if ($U == 'hr101' and $P == 'karthi@12345') {
                      $_SESSION['userL'] = $U;
                      header("location:main.php");
                    } else {
                      echo '<div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Username and password is incorrect!</strong>
                    </div>';
                    }
                  }
                }
                ?>
                <input type="submit" class="btn btn-primary btn-lg" name="Login" value="Login">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#id_password');
togglePassword.addEventListener('click', function(e) {
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);
  this.classList.toggle('bi-eye-slash-fill');
});
</script>

</html>