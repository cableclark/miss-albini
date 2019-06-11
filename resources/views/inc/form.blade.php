@include('inc.cky')

    <div class="form-group">

        <label for="title">Наслов: </label>

        <input class="form-control" type="text" placeholder="Text input" name="title" value="{{isset($post)? $post->title :old('title')}}">

    </div>


    <div class="form-group">

        <label for="body">Текст: </label>
        <textarea id="editor1" name="body">{{isset($post)? $post->body :old('body')}}</textarea>

    </div>

    <div class="form-group">

        <label for="featured_image">Set featured image</label>

        <input type="file" class="form-control-file" id="featured_image" name="featured_image">

    </div>


    <div class="form-group">

          <button type= "submit" class="btn btn-primary">Submit</button>

          <a href="/posts"> <button class="btn">Cancel</button></a>

    </div>
