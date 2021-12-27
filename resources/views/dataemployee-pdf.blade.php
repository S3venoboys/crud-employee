<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Employee</h1>

<table id="customers">
    <tr>
        <th>id</th>
        <th>Nama</th>
        <th>Posisi</th>
        <th>Perusahaan</th>
    </tr>
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
</table>

</body>
</html>


