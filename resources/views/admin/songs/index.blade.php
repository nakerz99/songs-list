@extends('layouts.admin_layout')

@section('content')
<div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Song List</li>
</ol>

<!-- DataTables SongList -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas  fa-music"></i>
   Song List</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Date Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Date Created</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody></tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">&nbsp;</div>
</div>
</div>

@endSection