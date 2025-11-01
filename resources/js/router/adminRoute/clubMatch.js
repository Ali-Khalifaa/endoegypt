import clubMatch from "../../views/admin/clubMatch/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'clubMatch',
        
        children:[
            {
                path: '',
                name: 'clubMatch',
                component: clubMatch,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('club match read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
