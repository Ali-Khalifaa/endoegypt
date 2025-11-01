import clubTeam from "../../views/admin/clubTeam/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'clubTeam',
        children:[
            {
                path: '',
                name: 'clubTeam',
                component: clubTeam,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;
                    if(permission.includes('club team read')){
                        console.log('beforeEnter')
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
