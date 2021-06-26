@extends('layouts/contentLayoutMaster')

@section('title', 'Bank CallBack')

@section('content')
  <div class="content-body">
    <div class="row">
      <div class="col-lg-12 commission">
        <div class="card">
          <h4 class='card-header'>Payment</h4>
          <div class="card-body">
            <div class="table-responsive">
              @if($status == 'success')
                <div class='alert alert-success'>{{$description}}</div>
              @endif
              @if($status == 'warning')
                <div class='alert alert-warning'>{{$description}}</div>
              @endif
            </div>

            <div>
              <a href="{{route('BookReports')}}" class="btn btn-primary float-right">Reports</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
