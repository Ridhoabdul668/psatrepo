<!DOCTYPE html>
<html>
<head>
    <title>Ubah Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Ubah Status Tugas</h2>

        <form method="POST" action="/penerima/update-status/{{ $tugas->id }}">
            @csrf
            <label class="block mb-2">Status</label>
            <select name="status" class="w-full border px-4 py-2 mb-4 rounded">
                  <option value="Pending" {{ $tugas->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                     <option value="Tolak" {{ $tugas->status == 'Tolak' ? 'selected' : '' }}>Tolak</option>
                     <option value="Selesai" {{ $tugas->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="/penerima" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>
