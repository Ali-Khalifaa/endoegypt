import teamGallery from "../../views/admin/teamGallery/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'teamGallery',
        
        children:[
            {
                path: '',
                name: 'teamGallery',
                component: teamGallery,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('team gallery read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
