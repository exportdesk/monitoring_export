<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    background: linear-gradient(to right,#1e3c72,#2a5298);
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}

.login-box {
    background:white;
    padding:30px;
    border-radius:15px;
    width:100%;
    max-width:400px;
    box-shadow:0 5px 20px rgba(0,0,0,0.2);
}

.title {
    text-align:center;
    margin-bottom:20px;
    font-weight:bold;
    color:#1e3c72;
}

.btn-login {
    background:#1e3c72;
    color:white;
}

.btn-login:hover {
    background:#16335c;
}
</style>

</head>

<body>

<div class="login-box">

<h4 class="title">
<i class="fa fa-user-circle"></i> Login Admin
</h4>

<form method="POST" action="cek_login.php">

<div class="mb-3">
<input type="text" name="username" class="form-control" placeholder="Username" required>
</div>

<div class="mb-3">
<input type="password" name="password" class="form-control" placeholder="Password" required>
</div>

<button class="btn btn-login w-100">Login</button>

</form>

</div>

<?php if(isset($_GET['error'])){ ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Login Gagal',
    text: 'Username atau Password salah!',
});
</script>
<?php } ?>

</body>
</html>