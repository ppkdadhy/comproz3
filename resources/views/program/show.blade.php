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
    <span>Edulevel</span></a>
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
            <h5 class="m-0">Detail Program</h5>
          </div>
          <div>
            <a href="{{url('programs')}}" class="btn btn-secondary btn-sm">
              <i class="fa fa-undo"></i> Back
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">

          <div class="row">
             <div class="col-md-8 offset-md-2">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th style="width:30%">Edulevel</th>
                  <td>{{$program->edulevel->name}}</td><!--$program dari ProgramController.php, edulevel dari file Program.php, name dari database-->
                </tr>
                <tr>
                  <th>Program</th>
                  <td>{{$program->name}}</td>
                </tr>
                <tr>
                  <th>Student Price</th>
                  <td>{{$program->student_price}}</td>
                </tr>
                <tr>
                  <th>Studen Max</th>
                  <td>{{$program->student_max}}</td>
                </tr>
                <tr>
                  <th>Info</th>
                  <td>{!!$program->info!!}</td>
                </tr>
                <tr>
                  <th>Created_at</th>
                  <td>{{$program->created_at}}</td>
                </tr>
              </tbody>
            </table>  
            </div> 
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection