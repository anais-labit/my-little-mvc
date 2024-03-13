<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/pwd/public/assets/css/style.css">
    <link rel="stylesheet" href="/pwd/public/assets/css/form.css">
</head>
<body>
<div class="content">
    <h1>Login</h1>
    <form action="/pwd/public/login" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
    <p>Don't have an account? <a href="/pwd/public/register">Register here</a>. Or go back to the <a href="/pwd/public">homepage</a>.
    </p>

</div>
</body>
</html>
