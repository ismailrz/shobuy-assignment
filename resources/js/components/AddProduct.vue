<template>
 <div>
     <div class="container">
         <div class="row">
             <div class="col">
                 <h3 class="font-weight-bold text-center" style="color: #28288A"> Add Product  </h3>
             </div>
         </div>
         <div class="row " style="background-color:#6c7d7c1a">
             <div class="offset-3 p-2" style="color: #28288A">
                     <form @submit.prevent="AddProduct">
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" v-model="name" class="form-control"  placeholder="Product Name" required>
                        </div>
                         <div class="form-group">
                            <label for="bank">Category </label>
                              <select v-model="category_id"  class="form-control" required>
                                  <option v-for="category in categories" :key="category.id" v-bind:value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                      
                      
                        <div class="form-group">
                            <label for="phone">Description</label>
                            <input type="text" v-model="description" class="form-control"  placeholder="Description" >
                        </div>
                        <div class="row">
                            <div class="col">
                                    <router-link to="/"  class="btn btn-secondary">Cancel </router-link>
                            </div>
                            <div class="col">
                                 <button type="submit" class="btn btn-block btn-success">Save</button>
                            </div>
                        </div>
                    </form>
             </div>
           
         </div>
        
     </div>
 </div>
</template>

<script>
export default {
    data(){
        return{
            categories:{},
            name:'',
            category_id:'',
            description:'',
        }
    },
     mounted(){
        this.getCategories();
    },
    methods:{
         getCategories(){
            axios.get("/api/get-categories")
           .then(res => {
               this.categories = res.data.categories;
          })
          .catch(err => { 
                console.log(err);
          });
        },
        AddProduct(){
            axios.post("/api/add-product", {
                name : this.name,
                category_id : this.category_id,
                description : this.description,
            })
           .then(res => {
            console.log(res.data.response);
            if(res.data.response == "success"){ 
                this.$router.push("/");
              }else{
                  alert(res.data.message);
              }
          })
          .catch(err => { 
                console.log(err);
          });
        },
    }
}
</script>

<style>

</style>