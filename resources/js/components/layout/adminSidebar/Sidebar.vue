<template>

    <!-- Start::app-sidebar -->
    <aside class="app-sidebar sticky" id="sidebar">

        <!-- Start::main-sidebar-header -->
        <div class="main-sidebar-header">
            <router-link :to="{name:`dashboard`}" class="header-logo">
                <img src="/assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo">
                <img src="/assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo">
                <img src="/assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark">
                <img src="/assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark">
                <img src="/assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white">
                <img src="/assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white">
            </router-link>
        </div>
        <!-- End::main-sidebar-header -->

        <!-- Start::main-sidebar -->
        <div class="main-sidebar" id="sidebar-scroll">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills flex-column sub-open">
                <div class="slide-left" id="slide-left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
                </div>
                <ul class="main-menu">

                    <!-- Start::Dashboard -->
                    <li class="slide">
                        <router-link :to="{name:'dashboard'}" class="side-menu__item">
                            <i class="bx bx-home side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.home')}}</span>
                        </router-link>
                    </li>
                    <!-- End::Dashboard -->

                     <!-- Start::permissions -->
                    <li class="slide has-sub" v-show="(permission.includes('admin read') || permission.includes('role read'))"
                        :class="[$route.name == 'admin' || $route.name == 'role'  ? 'active open': '']"
                    >
                        <a href="javascript:void(0);" class="side-menu__item"
                        :class="[$route.name == 'admin' || $route.name == 'role'  ? 'active': '']"
                        >
                            <i class="bx bx-user-plus side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.permissions')}}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1"
                        >
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{$t('global.permissions')}}</a>
                            </li>
                            <li class="slide" v-if="permission.includes('admin read')">
                                <router-link :to="{name:'admin'}" class="side-menu__item">{{$t('global.employees')}}</router-link>
                            </li>
                            <li class="slide" v-if="permission.includes('role read')">
                                <router-link :to="{name:'role'}" class="side-menu__item">{{$t('global.roleAndPermissions')}}</router-link>
                            </li>
                        </ul>
                    </li>
                    <!-- End::permissions -->

                    <li class="slide" v-show="permission.includes('banner read')">
                        <router-link :to="{name:'banner'}" class="side-menu__item">
                            <i class="bx bx-image side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.banners')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('organizing committee read')">
                        <router-link :to="{name:'organizingCommittee'}" class="side-menu__item">
                            <i class="bx bx-group side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.OrganizingCommittee')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('testimonial read')">
                        <router-link :to="{name:'testimonial'}" class="side-menu__item">
                            <i class="bx bxs-quote-left side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.testimonial')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('feature read')">
                        <router-link :to="{name:'feature'}" class="side-menu__item">
                            <i class="bx bx-star side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.feature')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('counter read')">
                        <router-link :to="{name:'counter'}" class="side-menu__item">
                            <i class="bx bx-calculator side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.counter')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('events read')">
                        <router-link :to="{name:'events'}" class="side-menu__item">
                            <i class="bx bx-calendar side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.events')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('event registration read')">
                        <router-link :to="{name:'eventRegistration'}" class="side-menu__item">
                            <i class="bx bx-calendar-check side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.eventRegistration')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('news read')">
                        <router-link :to="{name:'news'}" class="side-menu__item">
                            <i class="bx bx-news side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.news')}}</span>
                        </router-link>
                    </li>


                    <!-- <li class="slide" v-show="permission.includes('frequently asked question read')">
                        <router-link :to="{name:'frequentlyAskedQuestion'}" class="side-menu__item">
                            <i class="bx bxs-file-find side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.frequentlyAskedQuestion')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('language read')">
                        <router-link :to="{name:'language'}" class="side-menu__item">
                            <i class="bx bx-image side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.languages')}}</span>
                        </router-link>
                    </li> -->

                    <li class="slide" v-show="permission.includes('join us read')">
                        <router-link :to="{name:'joinUs'}" class="side-menu__item">
                            <i class="bx bx-image side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.joinUs')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('contact us read')">
                        <router-link :to="{name:'contactUs'}" class="side-menu__item">
                            <i class="bx bx-phone side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.contactUs')}}</span>
                        </router-link>
                    </li>

                    <li class="slide has-sub" v-show="(permission.includes('about us read') || permission.includes('about champion read') || permission.includes('history read') || permission.includes('mission read') || permission.includes('vision read'))"
                        :class="[$route.name == 'aboutUs' || $route.name == 'aboutChampion' || $route.name == 'history' || $route.name == 'vision' || $route.name == 'mission' ? 'active open': '']"
                    >
                        <a href="javascript:void(0);" class="side-menu__item"
                        :class="[$route.name == 'aboutUs' || $route.name == 'aboutChampion' || $route.name == 'history' || $route.name == 'vision' || $route.name == 'mission' ? 'active': '']"
                        >
                            <i class="bx bx-info-circle side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.aboutUs')}}</span>
                            <i class="fe fe-chevron-right side-menu__angle"></i>
                        </a>
                        <ul class="slide-menu child1"
                        >
                            <li class="slide side-menu__label1">
                                <a href="javascript:void(0)">{{$t('global.aboutUs')}}</a>
                            </li>
                            <li class="slide" v-if="permission.includes('about us read')">
                                <router-link :to="{name:'aboutUs'}" class="side-menu__item">{{$t('global.aboutUs')}}</router-link>
                            </li>
                            <!-- <li class="slide" v-if="permission.includes('tournament regulation read')">
                                <router-link :to="{name:'aboutChampion'}" class="side-menu__item">{{$t('global.aboutChampion')}}</router-link>
                            </li>
                            <li class="slide" v-if="permission.includes('history read')">
                                <router-link :to="{name:'history'}" class="side-menu__item">{{$t('global.history')}}</router-link>
                            </li>
                            <li class="slide" v-if="permission.includes('vision read')">
                                <router-link :to="{name:'vision'}" class="side-menu__item">{{$t('global.vision')}}</router-link>
                            </li>
                            <li class="slide" v-if="permission.includes('mission read')">
                                <router-link :to="{name:'mission'}" class="side-menu__item">{{$t('global.mission')}}</router-link>
                            </li> -->

                        </ul>
                    </li>

                    <li class="slide" v-show="permission.includes('contact message read')">
                        <router-link :to="{name:'contactMessage'}" class="side-menu__item">
                            <i class="bx bx-envelope side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.contactMessage')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('newsletter read')">
                        <router-link :to="{name:'newsletter'}" class="side-menu__item">
                            <i class="bx bxs-news side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.newsletter')}}</span>
                        </router-link>
                    </li>
                    <li class="slide" v-show="permission.includes('setting read')">
                        <router-link :to="{name:'setting'}" class="side-menu__item">
                            <i class="bx bx-cog side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.setting')}}</span>
                        </router-link>
                    </li>

                    <li class="slide" v-show="permission.includes('database backup read')">
                        <router-link :to="{name:'backup'}" class="side-menu__item">
                            <i class="bx bx-image side-menu__icon"></i>
                            <span class="side-menu__label">{{$t('global.databaseBackup')}}</span>
                        </router-link>
                    </li>

                </ul>
                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->

    </aside>
    <!-- End::app-sidebar -->
</template>

<script setup>
import {onMounted, computed, defineComponent, ref} from "vue";
import {useStore} from 'vuex';
import defaultrmenu from '../../../helper/defaultrmenu';


let store = useStore();
let path = ref('');
let { menu } = defaultrmenu();

let permission = computed(() => store.getters['authAdmin/permission']);


onMounted(()=>{
    menu();
});

</script>

<style>

</style>
