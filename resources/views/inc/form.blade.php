@include('inc.summernote')

    <div class="form-group">
        <label for="title">Наслов: </label>
        <input class="form-control" type="text" placeholder="Text input" name="title" value="{{isset($post)? $post->title :old('title')}}">
      </div>
      
      <div class="form-group">
        <label for="body">Текст: </label>
        <textarea id="summernote" class="form-control" placeholder="Textarea" name="body"> {{isset($post)? $post->body :old('body')}} </textarea>
      </div>
    
      <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="featured_image">
      </div>

      <div class="form-group">
          <button type= "submit" class="btn btn-primary">Submit</button>
          <a href="/posts"> <button class="btn">Cancel</button></a>
        
      </div>

      <div id="summernote"></div>
      
      <script>
        $('#summernote').summernote({
          placeholder: 'Уште еден интересен пост...',
          tabsize: 4,
          height: 300
        });
      </script> 