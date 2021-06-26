@extends('layouts/agent')

@section('title', $title)
@section('content')

  @include('panels._agent_internal_header')


  <!-- ================================= CONTENT ===============================-->

  <section class="main">
    <div class="container">
      <div class="bg-white">
        <h3>{{$title}}</h3>
        <p><i class="fa fa-check fa-fw check-icon"></i> {{$message}}</p>
        <br/>
        <br/>
        {{-- <a href="?">Resend verification email</a> --}}
      </div>
    </div>
  </section>
@endsection
