@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>Posts</thead>

                            @foreach($posts as $post)

                            <tr>
                                <td>{{$post->title}} <i>Објавено на:{{$post->created_at}} </i> </td>
                                <td><a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-success"> Edit</button></a>

                                <button type="submit" class="btn btn-danger submit" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$post->id}}">
                                      Delete
                                </button>


                                </td>
                             </tr>

                            @endforeach


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  var buttons = document.querySelectorAll(".submit")
  var modal = document.querySelector("#exampleModalCenter")
  console.log(modal)

  for (item of buttons) {

    item.addEventListener('click', (function () {
        modal.setAttribute("aria-hidden", "false") 
    }));
  }

</script>
@endsection
