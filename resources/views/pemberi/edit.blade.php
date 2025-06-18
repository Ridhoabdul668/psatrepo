<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Edit Tugas</h2>

        <form method="POST" action="/pemberi/update/{{ $tugas->id }}">
            @csrf

            <label class="block mb-2">Judul Tugas</label>
            <input type="text" name="tugas" value="{{ $tugas->tugas }}" class="w-full border rounded px-4 py-2 mb-4" required>

            <label class="block mb-2">Penerima Tugas</label>
            <select name="tugas_untuk" class="w-full border rounded px-4 py-2 mb-4">
                @foreach($pegawai as $p)
                    <option value="{{ $p->id }}" {{ $tugas->tugas_untuk == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
                @endforeach
            </select>

            <label class="block mb-2">Deadline</label>
            <input type="date" name="waktu_selesai" value="{{ $tugas->waktu_selesai }}" class="w-full border rounded px-4 py-2 mb-4" required>

            <label class="block mb-2">Status</label>
            <select name="status" class="w-full border rounded px-4 py-2 mb-4">
                     <option value="Pending" {{ $tugas->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                     <option value="Tolak" {{ $tugas->status == 'Tolak' ? 'selected' : '' }}>Tolak</option>
                     <option value="Selesai" {{ $tugas->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select> 


            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            <a href="/pemberi" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </form>
    </div>
</body>
</html>