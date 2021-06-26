@extends('layouts/contentLayoutMaster')

@section('title', 'Settings')

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
      <div class="col-lg-12 commission">
        <div class="card">
          <h4 class='card-header'>Commission Detail</h4>
          <div class="card-body">
            <form action="{{route('B2B-Setting-Commission-Update')}}" method="POST">
              @csrf
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>
                  <tr class="table-dark">
                    <td class="commission-type">Type</td>
                    <td>Percent</td>
                  </tr>
                  <tr>
                    <td>Hotel Reservation (Agents)</td>
                    <td class="text-right">
                      <div class='input-group'>
                        <div class='input-group-prepend'>Percent</div>
                        <input type="text" value="{{$hotel_reservations_percent}}" name="hotel_reservations_percent">
                      </div>
                    </td>
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
