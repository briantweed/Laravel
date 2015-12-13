@extends('app')


{{-- Page Title --}}
@section('title')
   Add New Movie
@stop

{{-- Page Heading --}}
@section('heading')
   Add New Movie
@stop

{{-- Subnav --}}
@section('subnav-left')
   &nbsp;
@stop

@section('subnav-right')

@stop


{{-- Main Body --}}
@section('content')

   {!! Form::open(['url'=>'lists/movies','files' => true]) !!}
      @include('segments.forms.movie.form')
   {!! Form::close() !!}

@stop


{{-- Jquery --}}
@section('jquery')

@stop
