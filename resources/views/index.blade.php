@extends('main')

@section('container')
<div class="container">
    <a class="btn btn-success mb-2" href="{{ url('pegawai/create') }}">Tambah</a>
    <a class="btn btn-info mb-2" href="{{ url('exportpdf') }}">Download PDF</a>
    <a class="btn btn-danger mb-2" href="{{ url('exportexcel') }}">Download Excel</a>
    <table class="table table-hover table-bordered">
        <tr class="text-center">
            <th>Nama</th>
            <th>Atasan</th>
            <th>Company</th>
            <th colspan="2">Update / Delete</th>
        </tr>
        @foreach ($datas as $main)
            <tr>
                <td>{{ $main->nama }}</td>
                @if ($main->atasan_id == null)
                    <td></td>
                @endif
                @foreach ($data as $join)
                    @if ($main->atasan_id == $join->id)
                        <td>{{ $join->nama }}</td>
                    @endif
                @endforeach
                <td>{{ $main->name }}</td>
                <td class="col-1"><a class="btn btn-info" href="{{ url('pegawai/'.$main->id.'/edit') }}">Update</a></td>
                <td class="col-1">
                    <form action="{{ url('pegawai/'.$main->id) }}" method="POST" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection