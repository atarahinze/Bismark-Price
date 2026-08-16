<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Bismark Admin Login</title>
</head>
<body>
<h2>ورود مدیریت بیسمارک</h2>

<form method="POST" action="{{ route('admin.authenticate') }}">
@csrf
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">ورود</button>
</form>

@if($errors->any())
<p>{{ $errors->first() }}</p>
@endif

</body>
</html>
