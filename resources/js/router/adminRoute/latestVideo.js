import latestVideo from "../../views/admin/latestVideo/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'latestVideo',
       
        children:[
            {
                path: '',
                name: 'latestVideo',
                component: latestVideo,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('latest video read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
