@extends('templates.layout')

@section ('content')
    <div class="container">
         @include('inc.flash')

         <table class="table">
             <thead>Photos</thead>

                 @foreach($photos as $photo)

                 <tr>
                     <td>{{$photo->title}} <i>Објавено на:{{$photo->created_at}} </i> </td>
                     <td>
                    <img class="featured_img" src="/storage/{{$photo->photo}}"

                     </td>
                  </tr>

                 @endforeach


         </table>

    </div>
@endsection
