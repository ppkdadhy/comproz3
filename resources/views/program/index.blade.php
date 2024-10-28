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
          <h5 class="m-0">Data Program</h5>
        </div>
        <div>
          <a href="{{url('programs/trash')}}" class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i> Trash
          </a>
          <a href="{{url('programs/create')}}" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Add
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
            @foreach ($programs as $key => $item)
            <tr>
              <td>{{/*$loop->iteration*/$programs->firstItem() + $key}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->edulevel->name}}</td><!--edulevel ini dari file program.php-->
              <td class="text-center">
                <a href="{{url('programs/'.$item->id)}}" class="btn btn-warning btn-sm">
                  <i class="fa fa-eye"></i>
                </a>
                <a href="{{url('programs/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil-alt"></i>
                </a>
                <form action="{{url('programs/'.$item->id)}}" method="post" onsubmit="return confirm('Apakah Anda ingin menghapus data dengan nama jenjang {{$item->name}} ?')" class="d-inline" > <!--agar edit dan delete sejajar-->
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
      <div class="card-footer pt-2 pb-5">
        <div>
            Showing
            {{$programs->firstItem()}}
            to
            {{$programs->lastItem()}}
        </div>
        <div class="d-flex justify-content-end">
            {{ $programs->links() }}
        </div>
    </div>
    
    </div>
  </div>
  </div>
</div>
@endsection