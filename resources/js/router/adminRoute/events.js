import events from "../../views/admin/event/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'events',
        
        children:[
            {
                path: '',
                name: 'events',
                component: events,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('events read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
