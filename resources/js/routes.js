

const registrarproveedores = () => import('./components/registrarproveedores.vue')
const Mostrar = () =>import('./Components/libros/Mostrar.vue');
const Editar = () =>import('./Components/libros/Editar.vue');
const Crear = () =>import('./Components/libros/Crear.vue');

export const routes=[

    {
        name:'mostrarlibros',
        path:'/',
        component:Mostrar
    },
    {
        name:'crearlibros',
        path:'/crearlibros',
        component:Crear
    },
    {
        name:'Editarlibros',
        path:'/Editarlibros/:id',
        component:Editar
    },
    {
        name: 'registrarproveedores',
        path: '/registrarproveedores',
        component: registrarproveedores
    },
]