import generalCondition from "../../views/admin/generalCondition/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'generalCondition',
      
        children:[
            {
                path: '',
                name: 'generalCondition',
                component: generalCondition,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('general condition read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
