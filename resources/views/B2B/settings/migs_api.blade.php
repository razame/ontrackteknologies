@extends('layouts/contentLayoutMaster')

@section('title', 'Hotel API')

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
        <div class="card">
          <h4 class='card-header'>MasterCard</h4>
          <div class="card-body">
            <form action="{{url('B2B-MIGS-API/update')}}" method="POST">
              @csrf
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>

                  <tr>
                    <td>Merchant ID</td>
                    <td>
                      <input type="text" class="form-control " value="{{$migs_merchant_id}}" name="migs_merchant_id">
                  </tr>
                  <tr>
                    <td>Api Password</td>
                    <td>
                      <input type="text" class="form-control " value="{{$migs_api_password}}" name="migs_api_password">
                  </tr>
                  <tr>
                    <td>API End Point</td>
                    <td>
                      <input type="text" class="form-control " value="{{$migs_endpoint}}" name="migs_endpoint">
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <input type="radio" value="active" name="migs_status"
                             @if($migs_status == 'active') checked @endif> Active
                      <input type="radio" value="deactive" name="migs_status"
                             @if($migs_status == 'deactive') checked @endif> Deactive
                  </tr>

                  </tbody>
                </table>
              </div>

              <div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
