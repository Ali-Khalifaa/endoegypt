import counter from "../../views/admin/counter/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'counter',

        children:[
            {
                path: '',
                name: 'counter',
                component: counter,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('counter read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
