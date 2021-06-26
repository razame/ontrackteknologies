@extends('layouts/contentLayoutMaster')

@section('title', 'Add New Branch')

@section('vendor-style')
@endsection
@section('page-style')
@endsection

@section('content')
  <!--- START FORM ---->
  {{ Form::model($user, array('route' => array('B2B-Branches.update', $user->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}
  @csrf

  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab"
             aria-controls="home-just" aria-selected="true">Branch Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab"
             aria-controls="profile-just" aria-selected="true">Basic Setting</a>
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
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="parent_id"><strong>Agent: </strong></label>
                    {!! Form::select('parent_id', $agents, null, ['class' => 'form-control']) !!}
                    @error('parent_id')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-8 col-md-6">
                  <div class="form-group">
                    <label for="agencyName"><strong>Branch Name: </strong>
                      Branch name will appear in all communication sent to your customers,
                    </label>
                    <input type="text" id="agencyName" required value="{{ $user->name }}" name="name"
                           placeholder="Branch Name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="contactPerson"><strong>Contact Person: </strong></label>
                    <input type="text" id="contactPerson" name="contact_person" placeholder="Contact Name"
                           value="{{ $user->contact_person }}"
                           class="form-control @error('contact_person') is-invalid @enderror">
                    @error('contact_person')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="website"><strong>Your Website: </strong></label>
                    <input type="text" id="website" name="website" placeholder="Website" value="{{ $user->website }}"
                           class="form-control @error('website') is-invalid @enderror">
                    @error('website')
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
                    <label for="secondaryEmail"><strong>Secondary Email Address: </strong></label>
                    <input type="text" id="secondaryEmail" name="secondary_email" placeholder="Secondary Email ID"
                           value="{{ $user->secondary_email }}"
                           class="form-control  @error('secondary_email') is-invalid @enderror">
                    @error('secondary_email')
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
                    <label for="no2"><strong>Phone No2: </strong></label>
                    <input type="text" id="no2" name="phone_number_2" value="{{ $user->phone_number_2 }}"
                           class="form-control  @error('phone_number_2') is-invalid @enderror">

                    @error('phone_number_2')
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
                    <label for="fax_number"><strong>Fax No: </strong></label>

                    <input type="text" id="fax_number" name="fax_number" value="{{ $user->fax_number }}"
                           class="form-control  @error('fax_number') is-invalid @enderror">

                    @error('fax_number')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror

                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="pan"><strong>PAN Number/Business Number: </strong></label>
                    <input type="text" id="pan" name="pan" value="{{ $user->pan }}" placeholder="XXXX1234XX"
                           class="form-control  @error('pan') is-invalid @enderror">
                    @error('pan')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="tax"><strong>Tax Registration Number: </strong></label>
                    <input type="text" id="tax" name="tax" value="{{ $user->tax }}" placeholder="XXXXHDSAXXY"
                           class="form-control @error('tax') is-invalid @enderror">
                    @error('tax')
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
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="address2"><strong>Address 2: </strong></label>
                    <input type="text" id="address2" name="address2" value="{{ $user->address2 }}"
                           placeholder="Address line 2" class="form-control @error('address2') is-invalid @enderror">
                    @error('address2')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="country"><strong>Country: </strong></label>
                    <select name="country" id="country"
                            class="select2 form-control @error('country') is-invalid @enderror">
                      <option value="Afganistan">Afghanistan</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="American Samoa">American Samoa</option>
                      <option value="Andorra">Andorra</option>
                      <option value="Angola">Angola</option>
                      <option value="Anguilla">Anguilla</option>
                      <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                      <option value="Argentina">Argentina</option>
                      <option value="Armenia">Armenia</option>
                      <option value="Aruba">Aruba</option>
                      <option value="Australia">Australia</option>
                      <option value="Austria">Austria</option>
                      <option value="Azerbaijan">Azerbaijan</option>
                      <option value="Bahamas">Bahamas</option>
                      <option value="Bahrain">Bahrain</option>
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bonaire">Bonaire</option>
                      <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                      <option value="Brunei">Brunei</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Canary Islands">Canary Islands</option>
                      <option value="Cape Verde">Cape Verde</option>
                      <option value="Cayman Islands">Cayman Islands</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Channel Islands">Channel Islands</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Christmas Island">Christmas Island</option>
                      <option value="Cocos Island">Cocos Island</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Congo">Congo</option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Cote DIvoire">Cote DIvoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curaco">Curacao</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="East Timor">East Timor</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
                      <option value="Eritrea">Eritrea</option>
                      <option value="Estonia">Estonia</option>
                      <option value="Ethiopia">Ethiopia</option>
                      <option value="Falkland Islands">Falkland Islands</option>
                      <option value="Faroe Islands">Faroe Islands</option>
                      <option value="Fiji">Fiji</option>
                      <option value="Finland">Finland</option>
                      <option value="France">France</option>
                      <option value="French Guiana">French Guiana</option>
                      <option value="French Polynesia">French Polynesia</option>
                      <option value="French Southern Ter">French Southern Ter</option>
                      <option value="Gabon">Gabon</option>
                      <option value="Gambia">Gambia</option>
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Ghana">Ghana</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Great Britain">Great Britain</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guam">Guam</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Hawaii">Hawaii</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="India">India</option>
                      <option value="Iran">Iran</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Isle of Man">Isle of Man</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Korea North">Korea North</option>
                      <option value="Korea Sout">Korea South</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Laos">Laos</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lebanon">Lebanon</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Liberia">Liberia</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macau">Macau</option>
                      <option value="Macedonia">Macedonia</option>
                      <option value="Madagascar">Madagascar</option>
                      <option value="Malaysia">Malaysia</option>
                      <option value="Malawi">Malawi</option>
                      <option value="Maldives">Maldives</option>
                      <option value="Mali">Mali</option>
                      <option value="Malta">Malta</option>
                      <option value="Marshall Islands">Marshall Islands</option>
                      <option value="Martinique">Martinique</option>
                      <option value="Mauritania">Mauritania</option>
                      <option value="Mauritius">Mauritius</option>
                      <option value="Mayotte">Mayotte</option>
                      <option value="Mexico">Mexico</option>
                      <option value="Midway Islands">Midway Islands</option>
                      <option value="Moldova">Moldova</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montserrat">Montserrat</option>
                      <option value="Morocco">Morocco</option>
                      <option value="Mozambique">Mozambique</option>
                      <option value="Myanmar">Myanmar</option>
                      <option value="Nambia">Nambia</option>
                      <option value="Nauru">Nauru</option>
                      <option value="Nepal">Nepal</option>
                      <option value="Netherland Antilles">Netherland Antilles</option>
                      <option value="Netherlands">Netherlands (Holland, Europe)</option>
                      <option value="Nevis">Nevis</option>
                      <option value="New Caledonia">New Caledonia</option>
                      <option value="New Zealand">New Zealand</option>
                      <option value="Nicaragua">Nicaragua</option>
                      <option value="Niger">Niger</option>
                      <option value="Nigeria">Nigeria</option>
                      <option value="Niue">Niue</option>
                      <option value="Norfolk Island">Norfolk Island</option>
                      <option value="Norway">Norway</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau Island">Palau Island</option>
                      <option value="Palestine">Palestine</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="Peru">Peru</option>
                      <option value="Phillipines">Philippines</option>
                      <option value="Pitcairn Island">Pitcairn Island</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Republic of Montenegro">Republic of Montenegro</option>
                      <option value="Republic of Serbia">Republic of Serbia</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russia">Russia</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="St Barthelemy">St Barthelemy</option>
                      <option value="St Eustatius">St Eustatius</option>
                      <option value="St Helena">St Helena</option>
                      <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                      <option value="St Lucia">St Lucia</option>
                      <option value="St Maarten">St Maarten</option>
                      <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                      <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                      <option value="Saipan">Saipan</option>
                      <option value="Samoa">Samoa</option>
                      <option value="Samoa American">Samoa American</option>
                      <option value="San Marino">San Marino</option>
                      <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                      <option value="Saudi Arabia">Saudi Arabia</option>
                      <option value="Senegal">Senegal</option>
                      <option value="Seychelles">Seychelles</option>
                      <option value="Sierra Leone">Sierra Leone</option>
                      <option value="Singapore">Singapore</option>
                      <option value="Slovakia">Slovakia</option>
                      <option value="Slovenia">Slovenia</option>
                      <option value="Solomon Islands">Solomon Islands</option>
                      <option value="Somalia">Somalia</option>
                      <option value="South Africa">South Africa</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syria">Syria</option>
                      <option value="Tahiti">Tahiti</option>
                      <option value="Taiwan">Taiwan</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
                      <option value="Tonga">Tonga</option>
                      <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                      <option value="Tunisia">Tunisia</option>
                      <option value="Turkey">Turkey</option>
                      <option value="Turkmenistan">Turkmenistan</option>
                      <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                      <option value="Tuvalu">Tuvalu</option>
                      <option value="Uganda">Uganda</option>
                      <option value="United Kingdom">United Kingdom</option>
                      <option value="Ukraine">Ukraine</option>
                      <option value="United Arab Erimates">United Arab Emirates</option>
                      <option value="United States of America">United States of America</option>
                      <option value="Uraguay">Uruguay</option>
                      <option value="Uzbekistan">Uzbekistan</option>
                      <option value="Vanuatu">Vanuatu</option>
                      <option value="Vatican City State">Vatican City State</option>
                      <option value="Venezuela">Venezuela</option>
                      <option value="Vietnam">Vietnam</option>
                      <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                      <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                      <option value="Wake Island">Wake Island</option>
                      <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zaire">Zaire</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                    @error('country')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                  <script>
                    let element = document.getElementById('country');
                    element.value = "{{ $user->country }}";
                  </script>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="state"><strong>State: </strong></label>
                    <input type="text" id="state" name="state" placeholder="State" value="{{ $user->state }}"
                           class="form-control  @error('state') is-invalid @enderror">
                    @error('state')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="city"><strong>City: </strong></label>
                    <input type="text" id="city" name="city" placeholder="City" value="{{ $user->city }}"
                           class="form-control  @error('city') is-invalid @enderror">
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="pincode"><strong>Pin Code / Zip Code: </strong></label>
                    <input type="text" id="pincode" name="pincode" placeholder="Pin Code / Zip Code"
                           value="{{ $user->pincode }}" class="form-control @error('pincode') is-invalid @enderror">
                    @error('pincode')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                  </div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                    <label for="currency"><strong>Currency: </strong></label>
                    <select name="currency" id="currency"
                            class="select2 form-control @error('currency') is-invalid @enderror">
                      <option value="USD" @if( $user->currency == 'USD') selected="selected" @endif label="US dollar">
                        USD
                      </option>
                      <option value="EUR" @if( $user->currency == 'EUR') selected="selected" @endif label="Euro">EUR
                      </option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-8 col-md-6">
                  <div class="form-group">
                    <label for="emailsign"><strong>Email Signature: </strong></label>
                    <textarea name="email_signature" id="emailsign" rows="8"
                              class="form-control">{{$user->email_signature}}</textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for=""><strong>Your Branch Logo:</strong></label>
                  <div class="media agencylogo">
                    <div class="media-heading">
                      <img src="/uploads/{{$user->logo}}" class="img-fluid" alt="">
                    </div>
                    <div class="media-body">
                      <div>
                        Your logo apears on the sign in screen and various other places. the logo file
                        must be in JPEG, JPG or PNG format and will be resized to
                        240 w <i class="feather icon-x"></i> 70 h pixels.
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

          <!------------- START col-lg-12 ----------------->
          <div class="col-lg-12 agency-form">
            <!------------ Start Add-Agency-Admin ------------>
            <div class="card">
              <h4 class="card-header header-has-bg">Branch Status</h4>
              <div class="card-body pl-0 pr-0">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                      <label for="password"><strong>Password: </strong></label>
                      <input type="text" name="password" id="password" class="form-control" placeholder="password">
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                      <label for="firstname"><strong>Active: </strong></label>
                      <select name="approved" id="approved"
                              class="select2 form-control @error('approved') is-invalid @enderror">
                        <option @if($user->approved) selected="selected" @endif  value="0">not active</option>
                        <option @if($user->approved) selected="selected" @endif  value="1">active</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!------------ End Add-Agency-Admin ------------>

          </div>
          <!----- END col-lg-12 ------>
        </div>

        <div class="tab-pane" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
          <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-xl-5 col-lg-6">
                    <div class="form-group">
                      <h5>Display Branch Logo On:</h5>
                      <div class="d-flex justify-content-between agency-row">
                        <div class="vs-checkbox-con vs-checkbox-primary">

                          <input type="checkbox" @if($user->e_ticket== '1') checked @endif  name='e_ticket' value="1">
                          <div class="vs-checkbox">
                            <div class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </div>
                          </div>
                          <div class="">E-Ticket</div>
                        </div>

                        <div class="vs-checkbox-con vs-checkbox-primary">
                          <input type="checkbox" @if($user->voucher== '1') checked @endif  name='voucher' value="1">
                          <div class="vs-checkbox">
                            <div class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </div>
                          </div>
                          <div class="">Voucher</div>
                        </div>

                      </div>
                    </div>
                    <!---->
                    <div class="form-group">
                      <h5>Hotel price display:</h5>
                      <div class="d-flex justify-content-between agency-row">
                        <div class="vs-radio-con">

                          <input type="radio" name="hotel_price_display"
                                 @if($user->hotel_price_display== 'per_night') checked @endif value="per_night">
                          <div class="vs-radio">
                            <div class="vs-radio--border"></div>
                            <div class="vs-radio--circle"></div>
                          </div>
                          <div class="">Per night</div>
                        </div>

                        <div class="vs-radio-con">
                          <input type="radio" name="hotel_price_display"
                                 @if($user->hotel_price_display== 'whole_stay') checked @endif value="whole_stay">
                          <div class="vs-radio">
                            <div class="vs-radio--border"></div>
                            <div class="vs-radio--circle"></div>
                          </div>
                          <div class="">Whole stay</div>
                        </div>
                      </div>
                    </div>
                    <!---->
                    <div class="form-group">
                      <h5>User Markup:</h5>
                      <div class="d-flex justify-content-between agency-row">
                        <div class="vs-checkbox-con vs-checkbox-primary">
                          <input type="checkbox" @if($user->enable_user_arkup== '1') checked
                                 @endif name='enable_user_arkup' value="1">
                          <div class="vs-checkbox">
                            <div class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </div>
                          </div>
                          <div class="">Enable User Markup</div>
                        </div>

                        <div class="vs-checkbox-con vs-checkbox-primary">
                          <input type="checkbox" @if($user->show_user_markup== '1') checked
                                 @endif name='show_user_markup' value="1">
                          <div class="vs-checkbox">
                            <div class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </div>
                          </div>
                          <div class="">Show User Markup</div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="col-xl-5 col-lg-6">
                    <div class="form-group">
                      <h5>Branch Markup on Air/Non-Air Search Result:</h5>
                      <div class="d-flex justify-content-between agency-row">
                        <div class="vs-radio-con">
                          <input type="radio" name="agency_markup_on_air_non_air_search_result"
                                 @if($user->agency_markup_on_air_non_air_search_result== 'show_net_rate') checked
                                 @endif value="show_net_rate">
                          <div class="vs-radio">
                            <div class="vs-radio--border"></div>
                            <div class="vs-radio--circle"></div>
                          </div>
                          <div class="">Show net rate</div>
                        </div>

                        <div class="vs-radio-con">
                          <input type="radio" name="agency_markup_on_air_non_air_search_result"
                                 @if($user->agency_markup_on_air_non_air_search_result== 'show_marked_up_rate') checked
                                 @endif  value="show_marked_up_rate">
                          <div class="vs-radio">
                            <div class="vs-radio--border"></div>
                            <div class="vs-radio--circle"></div>
                          </div>
                          <div class="">Show marked up rate</div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <h5> Hotel Search:</h5>
                      <div class="d-flex justify-content-between agency-row">
                        <div class="vs-checkbox-con vs-checkbox-primary">
                          <input type="checkbox" @if($user->quick_search_result== '1') checked
                                 @endif name='quick_search_result' value="1">
                          <div class="vs-checkbox">
                            <div class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </div>
                          </div>
                          <div class="">Quick Search Result</div>
                        </div>
                      </div>
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
        <button class="btn btn--blue mr-1" type="submit">Update Branch: [{{$user->name}}]</button>
        <span>Or</span>
        <a href="{{url('/B2B-Branches/')}}" class="btn btn-outline-blue ml-1">Cancel</a>
      </div>
    </div>
    </form>
    <!--- END FORM --->
@endsection
@section('vendor-script')
@endsection
@section('page-script')
@endsection

