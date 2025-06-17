<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Data Pegawai</h1>
        <a href="/admin/tambah" class="bg-green-600 text-white px-4 py-2 rounded">Tambah Pegawai</a>

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
</body>
</html>