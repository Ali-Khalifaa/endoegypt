import aboutChampion from "../../views/admin/aboutChampion/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'aboutChampion',
       
        children:[
            {
                path: '',
                name: 'aboutChampion',
                component: aboutChampion,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('about champion read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
