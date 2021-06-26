@extends('layouts/contentLayoutMaster')

@section('title', 'Site Pages')

@section('vendor-style')
  {{-- vendor files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection

@section('content')
  <div class="content-header row"></div>
  @if(session('success'))
    <div class='alert alert-success'>{{session('success')}}</div>
  @endif
  <div class="content-body">
    <div class="row">
      <div class="col-lg-12 ">
        @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="card">
          <h4 class='card-header'>Site General Settings</h4>
          <div class="card-body">
            <form action="{{route('SitePagesUpdate')}}" method="POST">
              @csrf
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>


                  @foreach($data['unserlized_value'] as $key => $field)
                    <tr>
                      <td width="10%">{{$key}}</td>
                      @if( $key =='page_title')
                        <td><input type="text" class="form-control " value="{{$field}}"
                                   name="page_title"></td>
                      @else
                        <td><textarea name="{{$key}}">{{$field}}</textarea></td>
                      @endif
                    </tr>
                  @endforeach
                  <input type="hidden" value="{{$data['id']}}" name="id"/>

                  </tbody>
                </table>
              </div>

              <div>
                <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('page-script')
  <script src="https://cdn.tiny.cloud/1/k88dpxlktf73vc6iysicoo6uheboci80z77s2otmcmdekipx/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
@endsection
