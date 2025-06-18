<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Pegawai</h2>
        <form method="POST" action="/admin/simpan">
            @csrf
            <label class="block mb-2">Nama Pegawai</label>
            <input type="text" name="nama" class="w-full border px-4 py-2 mb-4 rounded" required>

            <label class="block mb-2">Jabatan</label>
            <select name="jabatan" class="w-full border px-4 py-2 mb-4 rounded">
                <option value="admin">Admin</option>
                <option value="ceo">CEO</option>
                <option value="karyawan">Karyawan</option>
                <option value="staf">Staf</option>
                <option value="manager">Manager</option>
            </select>

            <label class="block mb-2">Kata Sandi</label>
            <input type="text" name="kata_sandi" class="w-full border px-4 py-2 mb-4 rounded" required>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="/admin" class="ml-4 text-gray-600 hover:underline">Kembali</a>
        </form>
    </div>
</body>
</html>