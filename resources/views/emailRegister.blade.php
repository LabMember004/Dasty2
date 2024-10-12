<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the Dashboard</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Your dashboard account has been created. You can log in using the following password:</p>
    <p><strong>{{ $password }}</strong></p>
    <p>For security reasons, please change this password after logging in.</p>
    <p>Thank you for joining us!</p>
</body>
</html>
