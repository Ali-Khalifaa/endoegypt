import feature from "../../views/admin/feature/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'feature',

        children:[
            {
                path: '',
                name: 'feature',
                component: feature,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('feature read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
