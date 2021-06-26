@extends('layouts/homepage')

@section('title', $data['page_title'])
@section('content')

  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">{{$data['page_title']}}</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">{{$data['page_title']}}</li>
            </ul><!-- Breadcrumbs -->
          </div>
        </div><!-- Page Title Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-90 pb-90">
      <div class="container">
        <div class="content-wrap w-100">
          {!! $data['content'] !!}

        </div>
      </div>
    </div>
  </section>


@endsection
