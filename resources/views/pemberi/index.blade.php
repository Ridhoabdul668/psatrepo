<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>
          


        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    


        <div class="mb-4 text-sm text-gray-700">
            Kamu login sebagai: <strong>{{ Session::get('nama') }}</strong>
        </div>
     
        <a href="/pemberi/tambah" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-blue-700">+ Tambah Tugas</a>

        <table class="w-full border-collapse mt-4">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Tugas</th>
                    <th class="p-2 border">Penerima</th>
                    <th class="p-2 border">Keterangan</th>
                    <th class="p-2 border">Waktu</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tugas as $index => $item)
                    <tr class="hover:bg-gray-100">
                        <td class="p-2 border">{{ $index + 1 }}</td>
                        <td class="p-2 border">{{ $item->tugas }}</td>
                        <td class="p-2 border">{{ $item->penerima }}</td>
                        <td class="p-2 border">{{ $item->keterangan }}</td>
                        <td class="p-2 border">{{ $item->waktu_selesai }}</td>
                        <td class="p-2 border">
                            @if($item->status == 'Selesai')
                                <span class="text-green-600 font-semibold">{{ $item->status }}</span>
                            @elseif($item->status == 'Pending')
                                <span class="text-yellow-600 font-semibold">{{ $item->status }}</span>  
                            @elseif($item->status == 'Tolak')
                                <span class="text-red-600 font-semibold">{{ $item->status }}</span>
                            @else
                                {{ $item->status }}
                            @endif
                        </td>
                        <td class="p-2 border space-x-2">
                            <a href="/pemberi/edit/{{ $item->id }}" class="text-blue-500 hover:underline">Edit</a>
                            <a href="/pemberi/hapus/{{ $item->id }}" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">Belum ada tugas.</td>
                        
                    </tr>
                @endforelse
            </tbody>
        </table>
            <div class="mt-4">
            <a href="/logout" class="text-red-500 hover:underline">Logout</a>
        </div>
    </div>

</body>
</html>