import tournamentRegulation from "../../views/admin/tournamentRegulation/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'tournamentRegulation',
        
        children:[
            {
                path: '',
                name: 'tournamentRegulation',
                component: tournamentRegulation,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('tournament regulation read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
