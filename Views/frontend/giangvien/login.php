<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/layout/login/css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>Đăng nhập</h1>
        <form method="POST" action="">
            <label for="username">Tài Khoản:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === 'admin' && $password === 'password') {
            echo 'Login successful';
        } else {
            echo 'Invalid username or password';
        }
    }
    ?>
</body>
</html>