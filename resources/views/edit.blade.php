@extends('main')

@section('container')
<div class="container">
    <form action="{{ url('pegawai/'.$model->id) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="mb-3">
            <label class="fw-bold">Nama :</label> 
            <input type="text" name="nama" class="form-control" value="{{ $model->nama }}" >
        </div>
        <div class="mb-3">
            <label class="fw-bold">Atasan : </label>
            <select name="atasan_id" class="form-control">
                <option value="1">Pak Budi</option>
                <option value="2">Pak Tono</option>
                <option value="3">Pak Totok</option>
                <option value="4">Bu Sinta</option>
                <option value="5">Bu Novi</option>
                <option value="6">Andre</option>
                <option value="7">Dono</option>
                <option value="8">Ismir</option>
                <option value="9">Anto</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="fw-bold">Company :</label>
            <select name="company_id" class="form-control">
                <option value="1">PT Javan</option>
                <option value="2">PT DICODING</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection