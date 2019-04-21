<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="card-body">
                        <p v-for="post in posts">
                         <a v-bind:href ="'/posts' + post.id"> post.title</a> 
                         post.body
                        </p>
                        <infinite-loading @distance="1"
                        @infinite='infiniteHandler'> </infinite-loading>  
                    </div>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {

            return {
                posts:[],
                page:1
            }
        } , 
         methods : {
             infiniteHandler($state) {
                let vm = this;
                this.$http.get('/load?page='+this.page)
                      .then(response =>{
                          return response.json();

                      }).then(newResponse=>{
                            $.each(newResponse.data, function (key, value) {
                                console.log(vm)
                                vm.posts.push(value)

                            });
                            $state.loaded()
                      }) ;
                      this.page = this.page + 1;  
             }
          
        }
    }
</script>
