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
                                    <label>Nombre del empreado</label>
                                    <input type="text" class="form-control" v-model="libro.tNombre">
                                </div>
                               <div class="form-group col-6 local" >
                                   <label>Empresa</label>
                                    <select name="select" v-model="libro.eCodEmpresa" >
                                        <option  v-for="empresa in empresas" :value="empresa.eCodEmpresa"   >{{ empresa.Empresas   }}</option> 
                                    </select>
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
        this.mostrarempresa()
    },
    name:"crear-libro",
    name:"empresas",
    
    data(){
        return {
            libro:{
                titulo:"",
                contenido:""
            },
              empresas:[]
        }
    },
    
    methods:{
         async mostrarempresa(){
            await this.axios.get('/api/empresa').then(response=>{
                this.empresas = response.data
            }).catch(error=>{
                console.log(error)
                this.empresas = []
            })
        },
        async crear(){
            
            await this.axios.post('/api/proveedor/',this.libro).then(response=>{
                this.$router.push({name:"mostrarlibros"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>