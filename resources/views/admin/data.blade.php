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

        <a href="/admin/tambah" class="bg-green-600 text-white px-4 py-2 rounded transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500">Tambah Pegawai</a>


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
                        <a href="/admin/show/{{ $p->id }}" class="text-green-900">Lihat Tugas</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
