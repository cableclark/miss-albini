<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=tnhabyvsuc7lsvuu7qstzizsgyc0o1efxtwm33qxnw0a2rwu"></script> 


  <script>tinymce.init({ selector:'textarea' });</script>
<div class="field">
        <label class="label">Title</label>
        <div class="control">
        <input class="input" type="text" placeholder="Text input" name="title" value="{{isset($post)? $post->title :old('title')}}">
        </div>
      </div>
      
      <div class="field">
        <label class="label">Message</label>
        <div class="control">
          <textarea id="textarea" class="textarea" placeholder="Textarea" name="body"> {{isset($post)? $post->body :old('body')}} </textarea>
        </div>
      </div>

    
      {{-- <div class="field">
        <label class="label">Subject</label>
        <div class="control">
            <div class="select">
            <select>
                <option>Select dropdown</option>
                <option>With options</option>
            </select>
            </div>
        </div>
    </div> --}}
      
      <div class="field is-grouped">
        <div class="control">
          <button type= "submit" class="button is-link">Submit</button>
        </div>
        <div class="control">
          <button class="button is-text">Cancel</button>
        </div>
      </div>
    