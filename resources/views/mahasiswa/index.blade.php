 <a href={{route('mahasiswa.add',)}}>
    <input type="button" value="Create">
<table border="1">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>NIDN</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $m)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $m->Fullname }}</td>
            <td>{{ $m->NIM }}</td>
            <td>{{ $m->NIDN }}</td>
            <td>{{ $m->tempat_Lahir }}</td>
            <td>{{ $m->Tanggal_Lahir }}</td>
            <td>{{ $m->Alamat }}</td>
            <td>{{ $m->created_at }}</td>
            <td>
                <a href={{route('mahasiswa.update', $m->id)}}>
                    <input type="button" value="Edit">
                </a>
                Edit
                <form action="{{route('mahasiswa.edit', $->id)}}"  method="post">
                @csrf
                <input type="hidden" name="id" value="{{$m->id}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="submit" value="Delete">
                </form>
                Delete
            </td>

        </tr>
        @endforeach
</table>