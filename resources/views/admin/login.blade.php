<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bismark Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-xl p-8 w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-3">Bismark Price</h1>
    <p class="text-center text-gray-500 mb-6">ورود مدیریت سیستم کنترل قیمت</p>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            اطلاعات ورود صحیح نیست.
        </div>
    @endif

    <form method="POST" action="{{ route('admin.authenticate') }}">
        @csrf

        <label class="block mb-2">ایمیل</label>
        <input type="email" name="email" class="w-full border rounded p-3 mb-4" required>

        <label class="block mb-2">رمز عبور</label>
        <input type="password" name="password" class="w-full border rounded p-3 mb-6" required>

        <button class="w-full bg-blue-600 text-white rounded p-3 hover:bg-blue-700">
            ورود به مدیریت
        </button>
    </form>
</div>

</body>
</html>
