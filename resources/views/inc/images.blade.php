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
