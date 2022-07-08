<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Blog</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
                         <div class="row">
                            <div class="col-12 mb-2 row">
                                <div class="form-group col-6 local ">
                                    <label>Autor</label>
                                    <input type="text" class="form-control" v-model="libro.Autor">
                                </div>
                                  <div class="form-group col-6 local ">
                                    <label>Título</label>
                                    <input type="text" class="form-control" v-model="libro.Titulo">
                                </div>
                                 <div class="form-group col-6 local ">
                                    <label>Edicion</label>
                                    <input type="text" class="form-control" v-model="libro.Edicion">
                                </div> 
                                <div class="form-group col-6 local ">
                                    <label>DatosDePublicación</label>
                                    <input type="text" class="form-control" v-model="libro.DatosDePublicación">
                                </div> 
                                <div class="form-group col-6 local ">
                                    <label>TipoDeContenido</label>
                                    <input type="text" class="form-control" v-model="libro.TipoDeContenido">
                                </div>
                               <div class="form-group col-6 local" >
                                   <label>Proveedor</label>
                                    <select name="select" v-model="libro.Proveedor" >
                                        <option  v-for="Proveedors in proveedores" :value="Proveedors.id"   >{{ Proveedors.Proveedor   }}</option> 
                                    </select>
                                </div>
                                  <div class="form-group col-6 local ">
                                    <label>Restricciones</label>
                                    <input type="text" class="form-control" v-model="libro.Restricciones">
                                </div>
                                   <div class="form-group col-6 local ">
                                    <label>Materia</label>
                                    <input type="text" class="form-control" v-model="libro.Materia">
                                </div>
                                
                            </div>
                            <div class="col-12 mb-2">

                                
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
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
    name:"editar-blog",
     name:"proveedores",
   
    data(){
        return {
            libro:{
                Titulo:"",
                Autor:"",
            },
              proveedores:[]
        }
    },
    mounted(){
        this.mostrarBlog()
         this.mostrarpovedor()
    },
    methods:{
        async mostrarpovedor(){
            await this.axios.get('/api/proveedor').then(response=>{
                this.proveedores = response.data
            }).catch(error=>{
                console.log(error)
                this.proveedores = []
            })
        },
        async mostrarBlog(){
            await this.axios.get(`/api/libro/${this.$route.params.id}`).then(response=>{
                const { Autor, Titulo,Edicion,TipoDeContenido,DatosDePublicación,Proveedor,Restricciones,Materia } = response.data
                this.libro.Autor = Autor
                this.libro.Titulo = Titulo
                this.libro.Edicion = Edicion
                this.libro.TipoDeContenido = TipoDeContenido
                this.libro.DatosDePublicación = DatosDePublicación
                this.libro.Proveedor = Proveedor
                this.libro.Restricciones = Restricciones
                this.libro.Materia = Materia
                
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/libro/${this.$route.params.id}`,this.libro).then(response=>{
                this.$router.push({name:"mostrarlibros"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>