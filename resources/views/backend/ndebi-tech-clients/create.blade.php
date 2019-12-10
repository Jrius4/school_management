@extends('layouts.backend.main')

@section('title', 'Ndebitech | Add new Client')

@section('content')



          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>Client <small>Add new Client</small></h1>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('backend.ndebi-tech-clients.index') }}">Clients</a></li>
                    <li class="breadcrumb-item active">Add new Client</li>
                  </ol>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>



      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-primary shadow-sm p-2">
                <div class="card-title">
                  <h3>Create Client</h3>
                </div>
              </div>
                {!! Form::model($client, [
                    'method' => 'POST',
                    'route'  => 'backend.ndebi-tech-clients.store',
                    'files'  => TRUE,
                    'id' => 'post-form'
                ]) !!}
                
                <div class="row d-flex justify-content-between">
                  @include('backend.ndebi-tech-clients.form')
                </div>
                
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <!-- ./row -->
        </div>
      </section>
      <!-- /.content -->


@endsection

@include('backend.ndebi-tech-clients.script')
