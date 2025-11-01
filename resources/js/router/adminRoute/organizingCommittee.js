import organizingCommittee from "../../views/admin/organizingCommittee/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'organizingCommittee',
       
        children:[
            {
                path: '',
                name: 'organizingCommittee',
                component: organizingCommittee,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('organizing committee read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
