import {createRouter, createWebHistory} from 'vue-router';
import middlewarePipeline from "./middlewarePipeline";
import AuthLayout from "../layouts/Auth.vue";
import DashboardLayout from "../layouts/Dashboard.vue";
import Login from "../views/admin/auth/Login.vue";
import Page404 from "../views/admin/errors/Page404.vue";
import store from "../store/admin.js";
import auth from "../middleware/admin/auth.js";
import guest from "../middleware/admin/guest";
import admin from "./adminRoute/admin.js";
import category from "./adminRoute/category.js";
import color from "./adminRoute/color.js";
import area from "./adminRoute/area.js";
import banner from "./adminRoute/banner.js";
import country from "./adminRoute/country.js";
import joinUs from "./adminRoute/joinUs.js";
import language from "./adminRoute/language.js";
import backup from "./adminRoute/backup.js";
import frequentlyAskedQuestion from "./adminRoute/frequentlyAskedQuestion.js";
import ageCategory from "./adminRoute/ageCategory.js";
import outfitColor from "./adminRoute/outfitColor.js";
import learnAbout from "./adminRoute/learnAbout.js";
import tournamentInformation from "./adminRoute/tournamentInformation.js";
import tournamentRegulation from "./adminRoute/tournamentRegulation.js";
import generalCondition from "./adminRoute/generalCondition.js";
import childSafetyPolicy from "./adminRoute/childSafetyPolicy.js";
import latestVideo from "./adminRoute/latestVideo.js";
import teamGallery from "./adminRoute/teamGallery.js";
import championshipGallery from "./adminRoute/championshipGallery.js";
import championAward from "./adminRoute/championAward.js";
import testimonial from "./adminRoute/testimonial.js";
import brand from "./adminRoute/brand.js";
import news from "./adminRoute/news.js";
import contactUs from "./adminRoute/contactUs.js";
import contactMessage from "./adminRoute/contactMessage.js";
import newsletter from "./adminRoute/newsletter.js";
import aboutUs from "./adminRoute/aboutUs.js";
import aboutChampion from "./adminRoute/aboutChampion.js";
import history from "./adminRoute/history.js";
import vision from "./adminRoute/vision.js";
import mission from "./adminRoute/mission.js";
import clubTeam from "./adminRoute/clubTeam.js";
import clubMatch from "./adminRoute/clubMatch.js";
import result from "./adminRoute/result.js";
import user from "./adminRoute/user.js";
import popupAd from "./adminRoute/popupAd.js";
import playerGallery from "./adminRoute/playerGallery.js";


import role from "./adminRoute/role.js";
import Notification from '../views/admin/notification/notification.vue';
import profile from '../views/admin/profile/index.vue';

const routes = [
    {
        path: '/admin',
        redirect: { name: 'login' },
    },
    {
        path: '/admin',
        component: DashboardLayout,
        meta: { middleware: [auth] },
        children:[
            {
                path: '',
                redirect: { name: 'Page404' },
            },
            {path: `dashboard`, name: `dashboard`, component: () => import('../views/admin/dashboard/index.vue')},
            {
                path: 'notifications',
                name: 'notifications',
                component: Notification
            },
            {
                path: 'profile',
                name: 'profile',
                component: profile
            },
            ...admin,
            ...role,
            ...category,
            ...color,
            ...area,
            ...banner,
            ...country,
            ...joinUs,
            ...language,
            ...backup,
            ...frequentlyAskedQuestion,
            ...ageCategory,
            ...outfitColor,
            ...learnAbout,
            ...tournamentInformation,
            ...tournamentRegulation,
            ...generalCondition,
            ...childSafetyPolicy,
            ...latestVideo,
            ...teamGallery,
            ...championshipGallery,
            ...championAward,
            ...testimonial,
            ...brand,
            ...news,
            ...contactUs,
            ...contactMessage,
            ...newsletter,
            ...aboutUs,
            ...aboutChampion,
            ...history,
            ...vision,
            ...mission,
            ...clubTeam,
            ...clubMatch,
            ...result,
            ...user,
            ...popupAd,
            ...playerGallery,
        ]
    },
    {
        path: '/admin/login',
        component: AuthLayout,
        children:[
            {
                path: '',
                name: 'login',
                component: Login,
                meta: {middleware: [guest]}
            },
        ]
    },

    // {
    //     path: 'forget-password',
    //     name: 'forgetPassword',
    //     component: forgetPassword,
    //     meta: {
    //         middleware: [guest]
    //     }
    // },
    // {
    //     path: 'reset-password',
    //     name: 'resetPassword',
    //     component: resetPassword,
    //     meta: {
    //         middleware: [guest]
    //     }
    // },

    {
        path: '/admin/:pathMatch(.*)*',
        name: 'Page404',
        component: Page404
    },
];

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'active',
    routes
});


router.beforeEach((to, from, next) => {
    if (!to.meta.middleware) return next();
    const middleware = to.meta.middleware;
    const context = {
        to,
        from,
        next,
        store
    };
    return middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1)
    });
});

export default router;
