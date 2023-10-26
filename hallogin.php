<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toko Roti - Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="login-container">
        <img src="./Image/Logo Roti.png" alt="Logo Roti">
        <form action="login.php" method="POST">
          <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i data-feather="user"></i>
                  </span>
                </div>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username">
              </div>
          </div>

          <div class="form-group">
              <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i data-feather="lock"></i>
                    </span>
                  </div>
            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
          </div>
        
            <a href="home.php">
                <button class="btn btn-primary" id="loginBtn">Login</button>
            </a>
            <div class="mt-3">
                <a href="#" class="text-muted">Lupa Kata Sandi?</a>
            </div>
            <div class="mt-2">
                Belum punya akun? <a href="haldaftar.php" class="text-primary">Daftar</a>
            </div>
        </form>
    </div>      

  <!-- Bootstrap JS (optional, if needed) -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>
</body>
</html>
