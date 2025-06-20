<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
      <nav class="mb-6">
        <a href="/admin" class="text-gray-600 hover:underline">Dashboard</a>
        <a href="/admin/pegawai" class="ml-4 text-gray-600 hover:underline">Data Pegawai</a>
        <a href="/admin/tambah" class="ml-4 text-gray-600 hover:underline">Tambah Pegawai</a>
        <a href="/admin/profile" class="ml-4 text-gray-600 hover:underline">Profile</a>
        <a href="/logout" class="ml-4 text-red-600 hover:underline">Logout</a>
    </nav>
       <h1 class="text-2xl font-bold mb-4 text-center">Profile</h1>
        <div class="border border-gray-300 p-5 rounded-lg bg-white text-center">
            <h2 class="text-xl font-semibold mb-2">Informasi Pegawai</h2>
            <p class="text-gray-700">Nama: {{Session::get('nama')}}</p>
            <p class="text-gray-700">Jabatan: {{Session::get('jabatan')}}</p>
            <p class="text-gray-700">Email: {{Session::get('email')}}</p>
            <p class="text-gray-700">Alamat: {{Session::get('alamat')}}</p>
        </div><br><br>
    </div>
</body>
</html>
