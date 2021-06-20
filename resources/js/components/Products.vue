<template>
 <div>
     <div class="container">
        
         <div class="row">
             <div class="col">
                 <router-link to="/add-category" class="btn btn-block btn-success">Add Category</router-link>
             </div>
             <div class="col">
             <router-link to="/add-product" class="btn btn-block btn-success">Add Product</router-link>
             </div>
         </div>
         <div class="row mt-3">
             <div v-for="product in products" :key="product.id">
                 <div class="card m-1" style="width: 18rem;">
                    <!-- <img class="card-img-top" :src="product.image" alt="Card image cap"> -->
                    <div class="card-body">
                        <h5 class="card-title">{{product.name}}</h5>
                        <p class="card-text">{{product.description}}</p>
                    </div>
                </div>
             </div>
         </div>
        
     </div>
 </div>
</template>

<script>
export default {
        data(){
        return{
            products:{},
        }
    },
    mounted(){
         this.getProducts();
    },
    methods:{
         getProducts(){
            axios.get("/api/get-products")
           .then(res => {
               this.products = res.data.products;
          })
          .catch(err => { 
                console.log(err);
          });
        },
        getAccounts(){
            axios.get("/api/get-accounts")
           .then(res => {
               this.accounts = res.data.accounts;
          })
          .catch(err => { 
                console.log(err);
          });
        },
        deleteAccount(id) {
            if (confirm("Are yor comfirm to delete?")) {
                axios
                .delete(`/api/delete-account/${id}`)
                .then(res => {
                    this.getAccounts();
                })
                .catch(err => {
                    console.log(err);
                });
            }
        },
    }
}
</script>

<style>

</style>