@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection

@section('content')
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="bg-authentication rounded-0 mb-0">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
              <!------------- START col-lg-12 ----------------->
              <div class="col-lg-8 col-md-9 col-sm-10 col-11 mx-auto agency-form mt-5 mb-5">
                <div class="card">
                  <h4 class="card-header mb-1">Create Account</h4>
                  <p class="px-2 mb-0">Fill the below form to create a new account.</p>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="agencyName"><strong>Agency Name: </strong>
                          </label>
                          <input type="text" name="name" id="agencyName" required value="{{ old('name') }}"
                                 placeholder="Agency Name" class="form-control @error('name') is-invalid @enderror">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="contactPerson"><strong>Contact Person: </strong></label>
                          <input type="text" id="contactPerson" name="contact_person" placeholder="Contact Name"
                                 value="{{ old('contact_person') }}" required
                                 class="form-control @error('contact_person') is-invalid @enderror">
                          @error('contact_person')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="website"><strong>Your Website: </strong></label>
                          <input type="text" id="website" name="website" placeholder="Website"
                                 value="{{ old('website') }}" required
                                 class="form-control @error('website') is-invalid @enderror">
                          @error('website')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="primaryEmail"><strong>Primary Email Address: </strong></label>
                          <input type="email" id="primaryEmail" name="email" placeholder="Primary Email ID"
                                 value="{{ old('email') }}" required
                                 class="form-control @error('email') is-invalid @enderror">
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="no1"><strong>Phone No1: </strong></label>
                          <div class="input-group">

                            <span class="input-group-text"><i class="fa fa-plus fa-fw"></i></span>
                            <input type="text" id="no1" name="phone_number_1" required placeholder="precode"
                                   value="{{ old('phone_number_1') }}"
                                   class="form-control  @error('phone_number_1') is-invalid @enderror">
                            @error('phone_number_1')
                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                            @enderror
                          </div>


                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="mobile"><strong>Mobile No: </strong></label>
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-plus fa-fw"></i></span>
                            <input type="text" id="mobile" name="mobile" required placeholder="precode"
                                   value="{{ old('mobile') }}"
                                   class="form-control  @error('mobile') is-invalid @enderror">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                            @enderror
                          </div>

                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="fax"><strong>Fax No: </strong></label>
                          <div class="input-group">

                            <span class="input-group-text"><i class="fa fa-plus fa-fw"></i></span>
                            <input type="text" id="fax" name="fax_number"
                                   class="precode form-control @error('fax_number') is-invalid @enderror">
                            @error('fax_number')
                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                            @enderror

                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="pan"><strong>PAN Number/Business Number: </strong></label>
                          <input type="text" id="pan" name="pan" placeholder="XXXX1234XX"
                                 class="form-control @error('pan') is-invalid @enderror">
                          @error('pan')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="tax"><strong>Tax Registration Number: </strong></label>
                          <input type="text" id="tax" name="tax" placeholder="XXXXHDSAXXY"
                                 class="form-control @error('tax') is-invalid @enderror">
                          @error('tax')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="address1"><strong>Address 1: </strong></label>
                          <input type="text" id="address1" name="address1" placeholder="Address line 1"
                                 class="form-control @error('tax') is-invalid @enderror">
                          @error('address1')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="address2"><strong>Address 2: </strong></label>
                          <input type="text" id="address2" name="address2" placeholder="Address line 2"
                                 class="form-control @error('address2') is-invalid @enderror">
                          @error('address2')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="country"><strong>Country: </strong></label>
                          <select name="country" id="country" required
                                  class="select2 form-control  @error('country') is-invalid @enderror">
                            <option value="0">iran</option>
                            <option value="1">turkey</option>
                          </select>
                          @error('country')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="state"><strong>State: </strong></label>
                          <select name="state" id="state"
                                  class="select2 form-control  @error('state') is-invalid @enderror">
                            <option value="0">state</option>
                          </select>
                          @error('state')
                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="city"><strong>City: </strong></label>
                          <select name="city" id="city"
                                  class="select2 form-control  @error('city') is-invalid @enderror">
                            <option value="0">city</option>
                          </select>
                          @error('city')
                          <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                          <label for="pincode"><strong>Pin Code / Zip Code: </strong></label>
                          <input type="text" id="pincode" name="pincode" placeholder="Pin Code / Zip Code"
                                 class="form-control @error('pincode') is-invalid @enderror">
                          @error('pincode')
                          <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                          @enderror
                        </div>
                      </div>

                    </div>
                    <div class="text-center pb-3">
                      <a href="{{ route('login')}}"
                         class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                      <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                    </div>
                  </div>


                </div>
              </div>
              <!----- END col-lg-12 ------>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

@endsection
