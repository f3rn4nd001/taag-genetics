<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear libro</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
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
                                <div class="form-group col-6 local">
                                    <label>Edicion</label>
                                    <input type="text" class="form-control" v-model="libro.Edicion">
                                </div>
                                <div class="form-group col-6 local">
                                    <label>Datos de publicación</label>
                                    <input type="text" class="form-control" v-model="libro.DatosDePublicación">
                                </div>
                                <div class="form-group col-6 local">
                                    <label>Tipo de contenido</label>
                                    <input type="text" class="form-control" v-model="libro.TipoDeContenido">
                                </div>
                                <div class="form-group col-6 local" >
                                   <label>Proveedor</label>
                                    <select name="select" v-model="libro.Proveedor" >
                                        <option  v-for="Proveedor in proveedores" :value="Proveedor.id"   >{{ Proveedor.Proveedor   }}</option> 
                                    </select>
                                </div>
                                <div class="form-group col-6 local">
                                    <label>Restricciones</label>
                                    <input type="text" class="form-control" v-model="libro.Restricciones">
                                </div>
                                  <div class="form-group col-6 local">
                                    <label>Materia</label>
                                    <input type="text" class="form-control" v-model="libro.Materia">
                                </div>
                                 
                             </div>
                               <div class="col-1 ">
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

     mounted(){
        this.mostrarpoveedor()
    },
    name:"crear-libro",
    name:"proveedores",
    
    data(){
        return {
            libro:{
                titulo:"",
                contenido:""
            },
              proveedores:[]
        }
    },
    
    methods:{
         async mostrarpoveedor(){
            await this.axios.get('/api/proveedor').then(response=>{
                this.proveedores = response.data
            }).catch(error=>{
                console.log(error)
                this.proveedores = []
            })
        },
        async crear(){
            
            await this.axios.post('/api/libro/',this.libro).then(response=>{
                this.$router.push({name:"mostrarlibros"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>