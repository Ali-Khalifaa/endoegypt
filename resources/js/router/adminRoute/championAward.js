import championAward from "../../views/admin/championAward/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'championAward',
        
        children:[
            {
                path: '',
                name: 'championAward',
                component: championAward,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('champion award read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
