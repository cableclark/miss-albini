@extends('templates.layout')

@section ('content')

    <div class="container">

        @include('inc.flash')

        <form action="/posts/{{$post->id}}" method="POST"  enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">

            @csrf

            @include('inc.form')

        </form>

        <div class="form-group">

             <form action="/posts/{{$post->id}}" method= "POST">

                <input type="hidden" name="_method" value="DELETE">

                @csrf
                <a href="/posts/{{$post->id}}/edit"><button type="submit" class="btn btn-danger"> Delete</button></a>


            </form>

        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Insert image</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <h2>Insert Image</h2>
              <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
              <table class="table">

                  <thead>Photos</thead>

                      @foreach($photos as $photo)

                      <tr>
                          <td> <h3>{{$photo->title}}</h3> <p><i>Објавено на:{{$photo->created_at}} </i></p> </td>
                          <td>
                         <img class="featured_img" src="/storage/{{$photo->photo}}"

                          </td>
                       </tr>

                      @endforeach
              </table>
            </div>

            </div>
          </div>
        </div>

        <script>
                     CKEDITOR.replace( 'editor1' );
         </script>

        <script type="text/javascript">

          var images = document.querySelectorAll('.featured_img');

          for (item of images) {
            item.addEventListener('click', function () {
                  CKEDITOR.instances.editor1.insertHtml('<img src="'+ this.getAttribute('src') +'">');

              ;
            })
          }


        </script>

         @if (!empty($post->featured_image))
             <div> <p>Featured image:</p> <img class="featured_img" src="/storage/{{$post->featured_image}}"> </div>
        @endif

    </div>

@endsection
