@extends('layouts/contentLayoutMaster')

@section('title', 'Chnage Password')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')

  <!--- START FORM ---->
  <form action="{{route('UpdateChagePassword')}}" method="POST">

    @csrf

    <div class="card">
      <div class="card-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab"
               aria-controls="home-just" aria-selected="true">Change Password</a>
          </li>

        </ul>


        {{-- Tab panes --}}
        <div class="tab-content pt-1">
          <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
            <div class="card mb-0">
              <div class="card-body">
                @if(session('success'))
                  <div class='alert alert-success'>{{session('success')}}</div>
                @endif
                @if($errors->any())
                  {!! implode('', $errors->all("<div class='alert alert-warning'>:message</div>")) !!}
                @endif
                <div class="row">

                  <div class="col-lg-8 col-md-6">
                    <div class="form-group">
                      <label for="current_password"><strong>Current Password: </strong>
                      </label>
                      <input type="password" id="current_password" required name="current_password" value=""
                             placeholder="Currrent Password" class="form-control">
                      @error('current_password')
                      <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-8 col-md-6">
                    <div class="form-group">
                      <label for="current_password"><strong>New Password: </strong>
                      </label>
                      <input type="password" id="new_password" required name="new_password" value=""
                             placeholder="New Password" class="form-control">
                      @error('current_password')
                      <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-lg-8 col-md-6">
                    <div class="form-group">
                      <label for="confirm_password"><strong>Confirm Password: </strong>
                      </label>
                      <input type="password" id="confirm_password" required name="confirm_password" value=""
                             placeholder="Confirm Password" class="form-control">
                      @error('confirm_password')
                      <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                      @enderror
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
    <div class="card">
      <div class="card-body text-right">
        <button class="btn btn--blue mr-1" type="submit">Change password</button>
      </div>
    </div>
  </form>
  <!--- END FORM --->
@endsection
@section('vendor-script')
@endsection
@section('page-script')
@endsection
