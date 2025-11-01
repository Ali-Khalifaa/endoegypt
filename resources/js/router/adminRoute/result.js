import result from "../../views/admin/result/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'result',
        
        children:[
            {
                path: '',
                name: 'result',
                component: result,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('result read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
