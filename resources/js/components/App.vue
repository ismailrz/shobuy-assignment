<template>
    <div class="container">
         <div class="row">
             <div class="col">
                 <a href="#">
                    <img class="normal" width="150px" src="https://shobuy.com.bd/wp-content/uploads/2019/10/Shobuy-Logo_UPDATED-1.png" alt="Logo"/>
                 </a>
             </div>
             <div class="col my-3">
                  <h2 style="color: #28288A" >Welcome To Shobuy </h2>
             </div>
         </div>
        <router-view/>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
