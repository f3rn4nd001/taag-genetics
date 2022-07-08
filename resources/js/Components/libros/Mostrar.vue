<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"crearlibros"}' class="btn btn-success"><i class="fas fa-plus-circle"></i></router-link>
        </div>
        <div class="col-12">             
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Autor</th>
                                   <th>Titulo</th>
                                   <th>Edicion</th>
                                   <th>Datos de publicación</th>
                                    <th>Tipo de contenido</th>
                                    <th>Proveedor</th>
                                    <th>Restricciones</th>
                                    <th>Materia</th>
                                   <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr v-for="libro in libros" :key="libro.id">
                                    <td>{{ libro.id }}</td>
                                    <td>{{ libro.Autor }}</td>
                                    <td>{{ libro.Titulo }}</td>
                                     <td>{{ libro.Edicion }}</td>
                                     <td>{{ libro.DatosDePublicación }}</td>
                                     <td>{{ libro.TipoDeContenido }}</td>
                                      <td>{{ libro.Proveedor }}</td>
                                     <td>{{ libro.Restricciones }}</td>
                                     <td>{{ libro.Materia }}</td>
                                   <td>
                                        <!-- llamamos al componente para Editar     -->
                                        <router-link :to='{name:"Editarlibros",params:{id:libro.id}}' class="btn btn-info"><i class="fas fa-edit"></i></router-link>
                                        <a type="button" @click="borrarlibro(libro.id)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"libros",
    data(){
        return {
            libros:[]
        }
    },
    mounted(){
        this.mostrarlibros()
    },
    methods:{
        async mostrarlibros(){
            await this.axios.get('/api/libro').then(response=>{
                this.libros = response.data
            }).catch(error=>{
                console.log(error)
                this.libros = []
            })
        },
        borrarlibro(id){
            if(confirm("¿Confirma eliminar el registro?")){
                this.axios.delete(`/api/libro/${id}`).then(response=>{
                    this.mostrarlibros()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>