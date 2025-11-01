import eventRegistration from "../../views/admin/eventRegistration/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'eventRegistration',
       
        children:[
            {
                path: '',
                name: 'eventRegistration',
                component: eventRegistration,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('event registration read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
