import playerGallery from "../../views/admin/playerGallery/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'playerGallery',

        children:[
            {
                path: '',
                name: 'playerGallery',
                component: playerGallery,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('player read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
