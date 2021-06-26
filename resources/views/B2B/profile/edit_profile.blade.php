@extends('layouts/contentLayoutMaster')

@section('title', 'Edit User')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')

  <!--- START FORM ---->
  {{ Form::model($user, array('route' => array('UpdateMyProfile'), 'method' => 'POST','enctype'=>'multipart/form-data')) }}

  @csrf

  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab"
             aria-controls="home-just" aria-selected="true">User Profile</a>
        </li>

      </ul>


      {{-- Tab panes --}}
      <div class="tab-content pt-1">
        <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
          <div class="card mb-0">
            <div class="card-body">
              @if($errors->any())
                {!! implode('', $errors->all("<div class='alert alert-warning'>:message</div>")) !!}
              @endif
              <div class="row">

                <div class="col-lg-8 col-md-6">
                  <div class="form-group">
                    <label for="agencyName"><strong>Full Name: </strong>
                    </label>
                    <input type="text" id="agencyName" required name="name" value="{{ $user->name }}"
                           placeholder="User Name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="primaryEmail"><strong>Primary Email Address: </strong></label>
                    <input type="text" id="primaryEmail" required name="email" placeholder="Primary Email ID"
                           value="{{ $user->email }}" class="form-control  @error('email') is-invalid @enderror">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="form-group">

                    <label for="no1"><strong>Phone No1: </strong></label>
                    <input type="text" id="no1" name="phone_number_1" value="{{ $user->phone_number_1 }}"
                           class="form-control  @error('phone_number_1') is-invalid @enderror">

                    @error('phone_number_1')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror


                  </div>
                </div>

                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="mobile"><strong>Mobile No: </strong></label>
                    <input type="text" id="mobile" name="mobile" value="{{ $user->mobile }}"
                           class="form-control  @error('mobile') is-invalid @enderror">

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror

                  </div>
                </div>


                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="address1"><strong>Address 1: </strong></label>
                    <input type="text" id="address1" name="address1" value="{{ $user->address1 }}"
                           placeholder="Address line 1" class="form-control @error('address1') is-invalid @enderror">
                    @error('address1')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for=""><strong>Your Logo/Picture:</strong></label>
                  <div class="media agencylogo">
                    <div class="media-heading">
                      <img src="/uploads/{{$user->logo}}" class="img-fluid" alt="">
                    </div>
                    <div class="media-body">
                      <div>

                      </div>
                    </div>
                  </div>
                  <fieldset class="form-group mt-2 d-flex align-content-end">
                    <div class="custom-file">
                      <input type="file" name="logo" class="custom-file-input" id="agencyLogo">
                      <label class="custom-file-label" for="agencyLogo">Choose file</label>
                    </div>
                  </fieldset>
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
      <button class="btn btn--blue mr-1" type="submit">Update</button>
      <span>Or</span>
      <a href="" class="btn btn-outline-blue ml-1">Cancel</a>
    </div>
  </div>
  </form>
  <!--- END FORM --->
@endsection
@section('vendor-script')
@endsection
@section('page-script')
@endsection
