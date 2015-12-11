@extends('app')


{{-- Page Title --}}
@section('title')
   Viewing Times
@stop


{{-- Main Body --}}
@section('content')

   <div class="row">
      <div class="col-xs-12">
         <ul class="xs-block-grid-1">
            @foreach($viewings as $viewing)
               <li>
                  {{$viewing->movie_name}} : {{$viewing->viewed}}
               </li>
            @endforeach
         </ul>
      </div>
   </div>



@stop
