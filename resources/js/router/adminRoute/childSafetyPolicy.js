import childSafetyPolicy from "../../views/admin/childSafetyPolicy/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'childSafetyPolicy',
        
        children:[
            {
                path: '',
                name: 'childSafetyPolicy',
                component: childSafetyPolicy,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('child safety policy read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
