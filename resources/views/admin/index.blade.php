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
            <a href="/admin/show" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Daftar Tugas</a>
            <a href="/logout" class="text-red-500 hover:text-red-700 px-4 py-2 rounded">Logout</a>
        </nav>
 
        <h1 class="text-6xl font-serif mb-4 text-center">Hallo </h1>
        <p class="text-gray-700 font-script text-center">Selamat datang <strong>{{ Session::get('nama') }}</strong></p><br><br>
    
        <h1 class="text-center text-2xl font-bold mb-4">Profile</h1>
        <div class="border border-gray-300 p-6 rounded-lg bg-white text-center">
            <h2 class="text-xl font-semibold mb-2">Informasi Pegawai</h2>
            <p class="text-gray-700">Nama: John Doe</p>
            <p class="text-gray-700">Jabatan: Manager</p>
            <p class="text-gray-700">Email: johndoe@example.com</p>
        </div>
    </div><br><br>
     
    <div class="max-w-4xl mx-auto text-center">
        <a href="tasks.html" class="bg-green-600 text-white px-4 py-2 rounded transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500">Lihat Daftar Tugas</a><br><br>
        <h1 class="text-2xl font-bold mb-4 text-center">Data Pegawai</h1>
        <a href="/admin/tambah" class="bg-green-600 text-white px-4 py-2 transition duration-150 ease-in-out hover:bg-indigo-500">Tambah Pegawai</a><br>

        @if(session('success'))
            <div class="mt-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="table-auto w-full mt-4 bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $p->id }}</td>
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->jabatan }}</td>
                        <td class="px-4 py-2">
                            <a href="/admin/edit/{{ $p->id }}" class="text-blue-600">Edit</a> |
                            <a href="/admin/hapus/{{ $p->id }}" onclick="return confirm('Yakin hapus?')" class="text-red-600">Hapus</a> |
                            <a href="/admin/show/{{ $p->id }}" class=" text-green-900 ">Lihat Tugas </a>
                           </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
             </div>  
        </div>
    </div>
</body>
</html>