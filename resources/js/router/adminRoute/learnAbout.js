import learnAbout from "../../views/admin/learnAbout/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'learnAbout',
       
        children:[
            {
                path: '',
                name: 'learnAbout',
                component: learnAbout,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('learn about read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
