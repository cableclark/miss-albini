<script type="text/javascript">
    var buttons = document.querySelectorAll(".submit");

    var modal = $('#modal');

    for (button of buttons) {
          jQuery(document).ready(function(){
              jQuery('.submit').click(function(e){
                 e.preventDefault();
                 var id = this.getAttribute('data-id');
                 modal.modal('show');
                 $('#delete').on('click', {id: this,id}, function(e) {
                    sendAjaxRequest(id);
                });
            });
       });
     }

    function sendAjaxRequest (id) {
        jQuery.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
        });

        jQuery.ajax({
           url: "/posts/" + id,
           method: 'DELETE',
           success: function(result){
              console.log(result);
        }});
   }

   //todо најди го постот и избриши го

</script>
