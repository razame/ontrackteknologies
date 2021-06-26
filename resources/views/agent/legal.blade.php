@extends('layouts/agent')

@section('title', 'About Us')
@section('content')

  @include('panels._agent_internal_header')

  {!! $data['content'] !!}
@endsection
