@extends('layouts/agent')

@section('title', 'Register')
@section('content')

  @include('panels._agent_internal_header')


  <!-- ================================= CONTENT ===============================-->

  <section class="main">
    <div class="container">
      <div class="bg-white">
        <h1 class="hotels-title">Register</h1>
        <div class="errors">
          @if($errors->any())
            {!! implode('', $errors->all("<div class='alert alert-danger'>:message</div>")) !!}
          @endif
        </div>
        <form action="{{route('agentsStoreRegisterForm1')}}" class="form form1" novalidate method="post">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group form-check">
              <label for="company"><span class="red-star">*</span> COMPANY NAME</label>
              <input type="text" class="form-control" id="name" required name="name" autocomplete="off">

              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col-md-6 form-group form-check">
              <label for="email"><span class="red-star">*</span> Email</label>
              <input type="email" class="form-control" id="email" required name="email" autocomplete="off">

              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col-md-6 form-group form-check">
              <label for="password"><span class="red-star">*</span> Password</label>
              <input type="password" class="form-control" id="password" required name="password" autocomplete="off">

              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col-md-6 form-group form-check">
              <label for="confirmpass"><span class="red-star">*</span> Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" required
                     name="password_confirmation" autocomplete="off">

              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col-md-12 form-group form-check">

              <input type="checkbox" style="height:auto" name="agreement" value="1" class="form-check-input" required
                     id="agreement">

              <label class="form-check-label" for="agreement">By registering , I agree to TripserB2B's <a
                  href="/agents/agent-contracts">Agent Contract</a>, <a href="/agents/term-of-use">Terms of Use</a> and
                <a href="/agents/privacy-policy">Privacy Policy</a> .
              </label>

              <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="col-12 has-form-submit">
              <button class="form-submit submit" type="submit">Send</button>
            </div>

            <div class="modal" id="register">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal body -->
                  <div class="modal-body text-center">
                    <i class="fa fa-check fa-fw check-icon"></i> Your registration was successful, an email was sent to
                    you
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer form-modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">OK</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
@section('scripts')
  {{-- <script>
      $(document).ready(function(){
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $(".submit").click(function(){
              $.ajax({
                  /* the route pointing to the post function */
                  url: "{{route('agentsStoreRegisterForm1')}}",
                  type: 'POST',
                  /* send the csrf-token and the input to the controller */
                  data: {
                      _token: CSRF_TOKEN, name:$("#name").val(),
                      email:$("#email").val(),
                      password:$("#password").val(),
                      password_confirmation:$("#password_confirmation").val()},
                  dataType: 'JSON',
                  success: function (data) {
                      $('#register').modal('show');
                  },
                  error:function(data){
                      var errors = data.responseJSON;
                      console.log(errors);
                      $(".errors").append(data.msg);
                  }
              });
          });
     });
  </script> --}}
@endsection
