<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Bismark Dashboard</title>
</head>
<body>
<h1>داشبورد مدیریت بیسمارک</h1>
<p>خوش آمدید به سیستم کنترل قیمت</p>

<form method="POST" action="{{ route('admin.logout') }}">
@csrf
<button type="submit">خروج</button>
</form>

</body>
</html>
