@extends('main')
@section('title', 'Edulevel')
@section('nav-item')
<li class="nav-item">
  <a class="nav-link" href="{{url('home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="{{url('edulevels')}}">
    <i class="fas fa-fw fa-puzzle-piece"></i>
    <span>Edulevels</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('programs')}}">
    <i class="fas fa-fw fa-puzzle-piece"></i>
    <span>Program</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ url('menubaru') }}">
  <i class="fas fa-fw fa-puzzle-piece"></i>
  <span>Menu Baru</span></a>
</li>
@endsection

@section('container-fluid')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Edulevel</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>
</div>
@endsection

@section('content')
<div class="content mt-3">
  <div class="container-fluid">
  <div class="animated fadeIn">

    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h5 class="m-0">Edit Jenjang</h5>
        </div>
        <div>
          <a href="{{url('edulevels')}}" class="btn btn-secondary btn-sm">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <form action="{{url('edulevels/'.$edulevels->id)}}" method="POST">
            @method('patch') <!--kalau routingnya patch harus method('patch'). kalau routingnya put harus method('put')-->
            @csrf<!--csrf; gunannya untuk melihat atau menampilkan data yang diinput hanya bisa digunakan di laravel pada kodingan HTML dan juga csrf gunanya agar tidak bisa diserang dari luar karena butuh csrf token-->
            <div class="form-group">
              <label for="nameid">Nama Jenjang</label>
              <input type="text" id="nameid" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $edulevels->name)}}" autofocus>
              @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              <label for="descid">Keterangan</label>
              <textarea id="descid" name="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc', $edulevels->desc)}}</textarea>
              @error('desc')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
          </form>
        </div>
      </div>
      </div>
    </div>
    
  </div>
  </div>
</div>
@endsection