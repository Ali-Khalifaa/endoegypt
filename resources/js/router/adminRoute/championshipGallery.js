import championshipGallery from "../../views/admin/championshipGallery/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'championshipGallery',
        
        children:[
            {
                path: '',
                name: 'championshipGallery',
                component: championshipGallery,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('championship gallery read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
