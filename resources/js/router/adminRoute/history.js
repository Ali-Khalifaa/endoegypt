import history from "../../views/admin/history/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'history',
       
        children:[
            {
                path: '',
                name: 'history',
                component: history,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('history read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
