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
            <a href="/admin/show" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Data Pegawai</a>
            <a href="/admin/show" class="text-gray-500 hover:text-gray-700 px-4 py-2 rounded">Daftar Tugas</a>
            <a href="/logout" class="text-red-500 hover:text-red-700 px-4 py-2 rounded">Logout</a>
        </nav>
        <table class="table-auto w-full mt-4 bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $p->id }}</td>
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->jabatan }}</td>
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