<table>
    <thead>
    <tr>
        <th><b>id</b></th>
        <th><b>Nama</b></th>
        <th><b>Posisi</b></th>
        <th><b>Perusahaan</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $e)
        <tr>
            <td>{{ $e->id }}</td>
            <td>{{ $e->nama }}</td>
            @if ($e->atasan_id == null)
                <td>CEO</td>
            @elseif ($e->atasan_id == 1)
                <td>Direktur</td>
            @elseif ($e->atasan_id == 2 || $e->atasan_id == 3)
                <td>Manager</td>
            @else 
                <td>Staff</td>
            @endif
            @if ($e->alamat == 1)
                <td>PT. Javan</td>
            @else
                <td>PT. DICODING</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>