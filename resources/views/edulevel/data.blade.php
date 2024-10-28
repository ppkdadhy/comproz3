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
    @if (session('status'))<!--Alert ini hasil dari rewirect-->
        <div class="alert-success">
          {{session('status')}}
        </div>
    @endif

    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h5 class="m-0">Data Jenjang</h5>
        </div>
        <div>
          <a href="{{url('edulevels/add')}}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Add
          </a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Desc.</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($edulevels as $item)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->desc}}</td>
              <td class="text-center">
                <a href="{{url('edulevels/edit/'.$item->id)}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil-alt"></i>
                </a>
                <form action="{{url('edulevels/'.$item->id)}}" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data dengan nama jenjang {{$item->name}} ?')" class="d-inline" > <!--agar edit dan delete sejajar-->
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  </div>
</div>
@endsection