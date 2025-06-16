<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="/login" class="bg-white p-6 rounded shadow w-96">
        @csrf
        <h1 class="text-xl font-bold mb-4">Login</h1>

        @if(session('error'))
            <p class="text-red-500 text-sm mb-2">{{ session('error') }}</p>
        @endif

        <label>ID Pegawai</label>
        <input type="number" name="pegawai_id" class="w-full p-2 border rounded mb-4" required>

        <label>Kata Sandi</label>
        <input type="password" name="kata_sandi" class="w-full p-2 border rounded mb-4" required>

        <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
    </form>
</body>
</html>
