<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Tugas Baru</h2>

        {{-- Info Pemberi --}}
        <div class="text-sm text-gray-600 mb-4">
            Tugas ini akan dikirim oleh: <span class="font-semibold text-gray-800">{{ Session::get('nama') }}</span>
        </div>

        <form method="POST" action="/pemberi/simpan">
            @csrf

            <label class="block mb-2">Judul Tugas</label>
            <input type="text" name="tugas" class="w-full border rounded px-4 py-2 mb-4" required>

            <label class="block mb-2">Penerima Tugas</label>
            <select name="tugas_untuk" class="w-full border rounded px-4 py-2 mb-4">
                @foreach($pegawai as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Keterangan</label>
            <textarea name="keterangan" rows="4" class="w-full border rounded px-4 py-2 mb-4" placeholder="Detail tugas..."></textarea>

            <label class="block mb-2">Waktu</label>
            <input type="date" name="waktu_selesai" class="w-full border rounded px-4 py-2 mb-4" required>


            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="/pemberi" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>
