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
    @if (session('status'))<!--Alert ini hasil dari rewirect-->
        <div class="alert-success">
          {{session('status')}}
        </div>
    @endif

    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h5 class="m-0">Data Program Terhapus</h5>
        </div>
        <div>
          <a href="{{url('programs/delete')}}" class="btn btn-danger btn-sm"onclick="return confirm('Yakin ingin menghapus permanen seluruh data ?');">
            <i class="fa fa-trash"></i> Delete All
          </a>
          <a href="{{url('programs/restore')}}" class="btn btn-info btn-sm">
            <i class="fa fa-undo"></i> Restore All
          </a>
          <a href="{{url('programs')}}" class="btn btn-secondary btn-sm">
            <i class="fa fa-chevron-left"></i> Back
          </a>

        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name Program</th>
              <th>Jenjang</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($programs->count() > 0) 
            
            @foreach ($programs as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->edulevel->name}}</td><!--edulevel ini dari file program.php-->
              <td class="text-center">
                <a href="{{url('programs/restore/'.$item->id)}}" class="btn btn-info btn-sm">
                Restore
                </a>
                <a href="{{url('programs/delete/'.$item->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus permanen ?');">
                  Delete Permanen
                  </a>
              </td>
            </tr>
            @endforeach
            @else
              <tr>
                <td colspan="4" class="text-center">Data Kosong</td>
              </tr>
              @endif
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  </div>
</div>
@endsection