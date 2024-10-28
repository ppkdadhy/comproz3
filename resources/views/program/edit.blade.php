@extends('main')
@section('title', 'Program')
@section('nav-item')
<li class="nav-item">
  <a class="nav-link" href="{{url('home')}}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Home</span></a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{url('edulevels')}}">
    <i class="fas fa-fw fa-puzzle-piece"></i>
    <span>Edulevels</span></a>
</li>
<li class="nav-item active">
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
      <h1 class="h3 mb-0 text-gray-800">Program</h1>
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
          <h5 class="m-0">Edit Program</h5>
        </div>
        <div>
          <a href="{{url('programs')}}" class="btn btn-secondary btn-sm">
            <i class="fa fa-undo"></i> Back
          </a>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <form action="{{ url('programs/'.$program->id) }}" method="POST">
            @method('PUT')
            @csrf <!-- csrf gunannya untuk melihat atau menampilkan data yang diinput hanya bisa digunakan di laravel pada kodingan HTML dan juga csrf gunanya agar tidak bisa diserang dari luar karena butuh csrf token -->
            <div class="form-group">
                <label for="name">Nama Program</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $program->name)}}"><!--old() buat agar data tidak terhapus ketika alert berjalan-->
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="edulevel_id">Jenjang</label>
                <select name="edulevel_id" id="edulevel_id" class="form-control @error('edulevel_id') is-invalid @enderror">
                  <option value="">- Pilih -</option>
                  @foreach ($edulevels as $item)
                  <option value="{{$item->id}}" {{ old('edulevel_id', $program->edulevel_id) == $item->id ? 'selected' : null}}>{{$item->name}}</option> <!--Selected adalah atribut html-->
                  @endforeach
                </select><!--old() buat agar data tidak terhapus ketika alert berjalan-->
                @error('edulevel_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="student_price">Harga Member</label>
                <input type="number" name="student_price" id="student_price" class="form-control @error('student_price') is-invalid @enderror" value="{{old('student_price', $program->student_price)}}"><!--old() buat agar data tidak terhapus ketika alert berjalan-->
                @error('student_price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="student_max">Member Maksimal</label>
                <input type="number" name="student_max" id="student_max" class="form-control @error('student_max') is-invalid @enderror" value="{{old('student_max', $program->student_max)}}"><!--old() buat agar data tidak terhapus ketika alert berjalan-->
                @error('student_max')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="info">Info</label>
                <textarea name="info" id="info" class="form-control @error('info') is-invalid @enderror">{{old('info', $program->info)}}</textarea>
                @error('info')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        
        </div>
      </div>
      </div>
    </div>
    
  </div>
  </div>
</div>
@endsection