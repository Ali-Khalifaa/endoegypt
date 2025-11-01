import outfitColor from "../../views/admin/outfitColor/index.vue";
import store from "../../store/admin";

export default [
    {
        path: 'outfitColor',
        
        children:[
            {
                path: '',
                name: 'outfitColor',
                component: outfitColor,
                beforeEnter: (to, from,next) => {
                    let permission = store.state.authAdmin.permission;

                    if(permission.includes('outfit color read')){
                        return next();
                    }else{
                        return next({name:'Page404'});
                    }
                }
            },
        ]
    },
];
