import tournamentInformation from "../../views/admin/tournamentInformation/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'tournamentInformation',
        
        children:[
            {
                path: '',
                name: 'tournamentInformation',
                component: tournamentInformation,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('tournament information read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
