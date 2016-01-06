<div id="cast-list">
   @foreach( $movie->cast as $actor )
      <div class="row">
         {{-- actor --}}
         <div class="col-xs-3">{{$actor->forename}}</div>
         <div class="col-xs-3">{{$actor->surname}}</div>
         <div class="col-xs-3">{{$actor->pivot->character}}</div>
         <div class="col-xs-1">
            <a class="btn btn-danger btn-xs" onclick="removeCastMember({{$actor->person_id}})" href="javascript:void(0)"><i class="ft icon-fail"></i></a>
         </div>
      </div>
   @endforeach
</div>
