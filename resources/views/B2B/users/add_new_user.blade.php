@extends('layouts/contentLayoutMaster')

@section('title', 'Add New User')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')

  <!--- START FORM ---->
  <form action="{{url('B2B-Users')}}" method="POST" enctype="multipart/form-data"
        class="needs-validation add-agency-page">
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
                      <input type="text" id="agencyName" required name="name" value="{{ old('name') }}"
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
                             value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
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
                      <input type="text" id="no1" name="phone_number_1" value="{{ old('phone_number_1') }}"
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
                      <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
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
                      <input type="text" id="address1" name="address1" value="{{ old('address1') }}"
                             placeholder="Address line 1" class="form-control @error('address1') is-invalid @enderror">
                      @error('address1')
                      <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                      @enderror
                    </div>
                  </div>


                </div>
              </div>
            </div>

            <!------------- START col-lg-12 ----------------->
            <div class="col-lg-12 agency-form">
              <!------------ Start Add-Agency-Admin ------------>
              <div class="card">
                <h4 class="card-header header-has-bg">User Detail</h4>
                <div class="card-body pl-0 pr-0">
                  <div class="row">


                    <div class="col-lg-4 col-md-6">
                      <div class="form-group">
                        <label for="firstname"><strong>Active: </strong></label>
                        <select name="approved" id="approved"
                                class="select2 form-control @error('approved') is-invalid @enderror">
                          <option @if(old('approved')) selected="selected" @endif  value="0">not active</option>
                          <option @if(old('approved')) selected="selected" @endif  value="1">active</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                      <div class="form-group">
                        <label for="firstname"><strong>Role: </strong></label>
                        <select name="user_role" id="user_role"
                                class="select2 form-control @error('user_role') is-invalid @enderror">
                          <option @if(old('user_role')) selected="selected" @endif  value="AreaManager">Area Manager
                          </option>
                          <option @if(old('user_role')) selected="selected" @endif  value="Supervisor">Supervisor
                          </option>
                          <option @if(old('user_role')) selected="selected" @endif  value="ExecutiveUser">Executive
                            User
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group">
                        <label for="password"><strong>Password: </strong></label>
                        <input type="text" name="password" required value="{{old('password')}}" id="password"
                               class="form-control" placeholder="password">
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                      <div class="form-group">
                        <label for="parent_id"><strong>Branch: </strong></label>
                        {!! Form::select('parent_id', $branches, null, ['class' => 'form-control']) !!}
                        @error('parent_id')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!------------ End Add-Agency-Admin ------------>

            </div>
            <!----- END col-lg-12 ------>
          </div>


        </div>
      </div>

    </div>
    <div class="card">
      <div class="card-body text-right">
        <button class="btn btn--blue mr-1" type="submit">Add User</button>
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
