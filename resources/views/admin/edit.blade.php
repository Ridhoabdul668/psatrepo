<!DOCTYPE html>
<html>
<head>
    <title>Edit Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Pegawai</h2>
        <form method="POST" action="/admin/update/{{ $pegawai->id }}">
            @csrf
            <label class="block mb-2">Nama Pegawai</label>
            <input type="text" name="nama" value="{{ $pegawai->nama }}" class="w-full border px-4 py-2 mb-4 rounded" required>

            <label class="block mb-2">Jabatan</label>
            <select name="jabatan" class="w-full border px-4 py-2 mb-4 rounded">
                <option value="admin" {{ $pegawai->jabatan == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pemberi" {{ $pegawai->jabatan == 'pemberi' ? 'selected' : '' }}>Pemberi</option>
                <option value="penerima" {{ $pegawai->jabatan == 'penerima' ? 'selected' : '' }}>Penerima</option>
                <option value="ceo" {{ $pegawai->jabatan == 'ceo' ? 'selected' : '' }}>CEO</option>
                <option value="karyawan" {{ $pegawai->jabatan == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                <option value="staf" {{ $pegawai->jabatan == 'staf' ? 'selected' : '' }}>Staf</option>
            </select>

            <label class="block mb-2">Kata Sandi Baru</label>
            <input type="text" name="kata_sandi" class="w-full border px-4 py-2 mb-4 rounded">

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="/admin" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>
