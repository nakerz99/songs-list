@extends('layouts.admin_layout')

@section('title', 'Song List')

@section('css')
  <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endSection

@section('content')
<div id="content-wrapper">
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
    <div class="form-group">
      <button class="btn btn-primary btn-add-song"> <span class="fa fa-plus"></span> Add Song </button>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered"  width="100%" cellspacing="0" id="songListTbl">
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



<!-- Modal -->
<div class="modal fade" id="songlistModal" tabindex="-1" role="dialog" aria-labelledby="songlistModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="songlistModalLabel"><span class="fa fa-music"></span>  Add Song</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger alert-dismissible alert-song-input" hidden>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
        <p class="error-message">
        </p>
      </div>

      <form action="/song" method="post" id="song_form">
      @csrf
      <input type="hidden" id="song_id" name="song_id" value="0">
      <div class="modal-body">
        <div class="row">
        <div class="col-md-12">
          <div class="form-label-group">
              <input type="title" name="title" id="title" class="form-control {{$errors->has('title')? 'is-invalid':''}}" placeholder="Song Title" required="required" autofocus="autofocus">
              <label for="title">{{ __('Song Title') }}</label>
          </div>
        <br>
          <div class="form-group">
            <label for="lyrics">{{ __('Song Lyrics') }}</label>
              <textarea name="lyrics" id="lyrics" cols="30" rows="10" class="form-control {{$errors->has('title')? 'is-invalid':''}}" required="required" ></textarea>
          </div> 
          <div class="form-label-group">
              <input type="artist" name="artist" id="artist" class="form-control {{$errors->has('artist')? 'is-invalid':''}}" placeholder="Song artist" required="required" autofocus="autofocus">
              <label for="artist">{{ __('Song Artist') }}</label>
          </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endSection

@section('js')
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{ asset('assets/js/sb-admin.min.js')}}"></script>
<script src="{{ asset('assets/js/demo/datatables-demo.js')}}"></script>
<script src="{{ asset('js/song.js')}}"></script>
@endSection