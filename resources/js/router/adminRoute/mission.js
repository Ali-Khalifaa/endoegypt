import mission from "../../views/admin/mission/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'mission',
       
        children:[
            {
                path: '',
                name: 'mission',
                component: mission,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('mission read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
