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
