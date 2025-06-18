<!DOCTYPE html>
<html>
<head>
    <title>Daftar Tugas Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Daftar Tugas Anda</h2>
        

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

            <div class="mb-4 text-sm text-gray-700">
            Kamu login sebagai: <strong>{{ Session::get('nama') }}</strong>
        </div>
     

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Tugas</th>
                       <th class="p-2 border">Keterangan</th>
                    <th class="p-2 border">Waktu</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tugas as $t)
                <tr>
                    <td class="p-2 border">{{ $t->tugas }}</td>
                    <td class="p-2 border">{{ $t->keterangan }}</td>
                    <td class="p-2 border">{{ $t->waktu_selesai }}</td>

                    <td class="p-2 border">
                        @if($t->status == 'Tolak')
                            <span class="bg-red-500 text-white px-2 py-1 rounded">Tolak</span>
                        @elseif($t->status == 'Pending')
                            <span class="bg-yellow-500 text-white px-2 py-1 rounded">Pending</span>
                        @elseif($t->status == 'Selesai' )
                            <span class="bg-green-500 text-white px-2 py-1 rounded">Selesai</span>
                        @else
                        {{ $item->status }}
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="/penerima/edit/{{ $t->id }}" class="text-blue-600 hover:underline">Ubah Status</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <div class="mt-4">
            <a href="/logout" class="text-red-500 hover:underline">Logout</a>
        </div>
    </div>
</body>
</html>
