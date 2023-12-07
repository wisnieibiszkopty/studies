<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<h1>Login</h1>
<form method="post" action="auth.php">
    <div class="form-item">
        <div class="input">
            <label class="mg-left" for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>
        <div class="input">
            <label class="mg-left" for="passwd">Password</label>
            <input type="text" name="passwd" id="passwd">
        </div>
    </div>

    <div class="border-gradient"><input type="submit" name="submit" value="login"></div>
</form>
</body>
</html>