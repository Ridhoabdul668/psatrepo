<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <nav class="mb-6">
            <a href="/admin" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Home</a>
            <a href="/admin/profile" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Profile</a>
            <a href="/admin/data" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Daftar Tugas</a>
            <a href="/admin/tugas" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Data Pegawai</a>
            <a href="/logout" class="text-red-500 hover:text-red-700 px-4 py-2 rounded">Logout</a>
        </nav>
  <div class="p-4">
    <h2 class="text-center text-xl font-bold mb-4">Profile</h2>
            <div class="flex flex-wrap -mx-3 mb-6">
                    <img src="/img" alt="Foto Profil"
                    class="rounded-full w-32 h-32 mx-auto object-cover border border-gray-300 shadow">
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md w-1/3 mx-auto text-center">
                    <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
                    <p><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</p>
                    <p><strong>Email:</strong> {{ $pegawai->email }}</p>
                    <p><strong>No HP:</strong> {{ $pegawai->no_hp }}</p>
                    <p><strong>Alamat:</strong> {{ $pegawai->alamat }}</p>
                </div>
            </div>
            </body>
     </html>
            
