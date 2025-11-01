import popupAd from "../../views/admin/popupAd/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'popupAd',

        children:[
            {
                path: '',
                name: 'popupAd',
                component: popupAd,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('popup ad read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
