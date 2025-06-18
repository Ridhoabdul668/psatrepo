<!DOCTYPE html>
<html>
<head>
    <title>Detail Tugas Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Tugas untuk: {{ $pegawai->nama }}</h2>

        @if(count($tugas) > 0)
            <table class="w-full table-auto border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Judul</th>
                        <th class="px-4 py-2">Keterangan</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tugas as $key => $t)
                        <tr class="border-t text-center">
                            <td class="px-4 py-2">{{ $key + 1 }}</td>
                            <td class="px-4 py-2">{{ $t->tugas }}</td>
                            <td class="px-4 py-2">{{ $t->keterangan }}</td>
                            <td class="px-4 py-2">{{ $t->status }}</td>
                            <td class="px-4 py-2">{{ $t->waktu_selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">Tidak ada tugas untuk pegawai ini.</p>
        @endif

        <a href="/admin" class="mt-4 inline-block text-blue-600 hover:underline">← Kembali ke halaman admin</a>
    </div>
</body>
</html>