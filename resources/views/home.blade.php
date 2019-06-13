@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <a href="{{url('posts/create')}}" title="Напиши нов пост..." class="btn btn-danger mb-4">
                Создади нов пост
           </a>


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
                            @isset($posts)
                              @foreach($posts as $post)
                              <tr>
                                  <td>
                                    {{$post->title}} <i>Објавено на:{{$post->created_at}} </i>
                                  </td>
                                  <td>
                                    <a href="/posts/{{$post->id}}/edit"><button type="button" class="btn btn-success"> Edit</button></a>

                                    <button type="submit" class="btn btn-danger submit"  data-id="{{$post->id}}">
                                          Delete
                                    </button>
                                  </td>
                               </tr>
                              @endforeach
                          @endisset
                          @if(count($posts) == 0)
                            <tr>
                                <td>Немаш постови. </td>
                             </tr>
                          @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id ="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> Само што ќе избришеше брилијатен пост</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

      </div>
      <div class="modal-body">
        <p>Дали си ти сериозна?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Се заебаам</button>
        <button id= "delete" type="button" class="btn btn-danger">Озбилна сум, бриши</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@if(isset($posts))
    @include('inc.ajaxCalls')
@endif



@endsection
