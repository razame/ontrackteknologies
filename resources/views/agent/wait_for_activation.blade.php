@extends('layouts/agent')

@section('title', 'Wait For Activation')
@section('content')

  @include('panels._agent_internal_header')


  <!-- ================================= CONTENT ===============================-->

  <section class="main">
    <div class="container">
      <div class="bg-white">
        <h3>Thank You!</h3>
        <p><i class="fa fa-check fa-fw check-icon"></i> Your registration was successful, an email was sent to you.</p>
        <br/>
        <br/>
        <a href="?">Resend verification email</a>
      </div>
    </div>
  </section>
@endsection
