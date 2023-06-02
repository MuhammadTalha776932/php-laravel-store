<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="GET" action="{{ url('/authenticate') }}">
        <label for="password">Password:</label>
        <input type="text" name="shop" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
