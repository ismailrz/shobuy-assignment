<template>
 <div>
     <div class="container">
         <div class="row">
             <div class="col">
                 <h3 class="font-weight-bold text-center" style="color: #28288A"> New Category  </h3>
             </div>
         </div>
         <div class="row " style="background-color:#6c7d7c1a">
             <div class="offset-3 p-2" style="color: #28288A">
                     <form @submit.prevent="AddCategory">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" v-model="name" class="form-control"  placeholder="Category Name" required>
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
            name:'',
            description:'',
        }
    },
    mounted(){
    },
    methods:{
        AddCategory(){
            axios.post("/api/add-category", {
                name : this.name,
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