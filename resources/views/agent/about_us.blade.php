@extends('layouts/agent')

@section('title', 'About Us')
@section('content')

  @include('panels._agent_internal_header')


  <!-- ================================= CONTENT ===============================-->

  <section class="main">
    <div class="container">
      <div class="bg-white">
        <h2 class="mb-0">{{$data['page_title']}}</h2>
        <p class="mb-0">{!! $data['content'] !!}</p>
      </div>
    </div>
  </section>
@endsection
