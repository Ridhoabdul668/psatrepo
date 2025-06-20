<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
        <table class="table-auto w-full mt-4 bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Id</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jabatan</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $p)
                    <tr>
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $p->id }}</td>
                        <td class="px-4 py-2">{{ $p->nama }}</td>
                        <td class="px-4 py-2">{{ $p->jabatan }}</td>
                        <td class="px-4 py-2">{{ $p->email }}</td>
                        <td class="px-4 py-2">{{ $p->alamat }}</td>
                        <td class="px-4 py-2">
                            <a href="/admin/edit/{{ $p->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <a href="/admin/delete/{{ $p->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</a>
                            <a href="/admin/show/{{ $p->id }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Show</a>
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