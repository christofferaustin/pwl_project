<!DOCTYPE html>
<html>
    <head>
        <title>Form Mahasiswa</title>
    </head>
    <body>

    <h2>Form Input Mahasiswa</h2>

    <form method="POST">
    @csrf

    Nama Lengkap &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp :
    <input type="text" name="nama"><br><br>

    Nomor Induk Mahasiswa &nbsp &nbsp &nbsp :
    <input type="text" name="nim"><br><br>

    Nomor Induk Siswa Nasional :
    <input type="text" name="nisn"><br><br>

    Tempat Lahir &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp  &nbsp &nbsp &nbsp &nbsp :
    <input type="text" name="tempat_lahir"><br><br>

    Tanggal Lahir &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp&nbsp  &nbsp &nbsp :
    <input type="date" name="tanggal_lahir"><br><br>

    Alamat &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :
    <textarea name="alamat"></textarea><br><br>

    <button type="submit">Simpan</button>
    </form>

</body>
</html>
