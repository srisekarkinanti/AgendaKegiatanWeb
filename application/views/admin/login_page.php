<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">HALAMAN LOGIN</h1>
                  </div>
                  <form class="user" action="<?= site_url('admin/login') ?>" method="POST">
                    <div class="form-group">
                      <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email atau Username.." required />
                    </div>
                    <div class="form-group">
                      <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control" name="password" placeholder="Password.." required />
                    </div>
                    <button type="submit" class="btn btn-dark btn-user btn-block">
                      Login
                    </button>
                    </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>