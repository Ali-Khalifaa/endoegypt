import ageCategory from "../../views/admin/ageCategory/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'ageCategory',

        children:[
            {
                path: '',
                name: 'ageCategory',
                component: ageCategory,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('age category read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
