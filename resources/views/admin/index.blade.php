<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
             <nav class="mb-6">
            <a href="/admin" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Home</a>
            <a href="/admin/profile" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Profile</a>
            <a href="/admin/data" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Data Pegawai</a>
            <a href="/admin/tugas" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Daftar Tugas</a>
            <a href="/logout" class="text-red-500 hover:text-red-700 px-4 py-2 rounded">Logout</a>
        </nav>
 
        <h1 class="text-6xl font-serif mb-4 text-center">Hallo </h1>
        <p class="text-gray-700 font-script text-center">Selamat datang <strong>{{ Session::get('nama') }}</strong></p><br><br>
    
        <h1 class="text-center text-2xl font-bold mb-4">Profile</h1>
             <div class="bg-white p-6 rounded-lg shadow-md w-1/3 mx-auto text-center">
                    <p><strong>Nama:</strong> {{ $pegawai->nama }}</p>
                    <p><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</p>
                    <p><strong>Email:</strong> {{ $pegawai->email }}</p>
                    <p><strong>No HP:</strong> {{ $pegawai->no_hp }}</p>
                    <p><strong>Alamat:</strong> {{ $pegawai->alamat }}</p>
                </div>
    </div><br><br>
     
    <div class="max-w-4xl mx-auto text-center">
        <a href="/admin/tugas" class="bg-green-600 text-white px-4 py-2 rounded transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500">Lihat Daftar Tugas</a>
        <a href="/admin/data" class="bg-green-600 text-white px-4 py-2 rounded transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500">Lihat Data Pegawai</a>
     
             </div>  
        </div>
    </div>
</body>
</html>