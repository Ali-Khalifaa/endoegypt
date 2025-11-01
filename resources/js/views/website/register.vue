<template>
    <!-- Start::app-content -->


    <!-- Start::row-1 -->
    <div class="col-xxl-12 col-xl-12 col-lg-12 my-5">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xl-6 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center">{{ $t('auth.SignUp') }}</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">{{ $t('global.Welcome & Join us by creating a free account !') }}</p>
                        <div class="row gy-3">
                            <div class="col-md-12">
                                <label class="form-label">{{ $t('global.countries') }} <span
                                        class="text-danger">*</span></label>
                                <Select v-model="v$.data.country_id.$model" :filterFields="['id', 'title']"
                                    :options="countries" filter
                                    :invalid="v$.data.country_id.$error || errors[`country_id`]" optionLabel="title"
                                    optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.data.country_id.$error || errors[`country_id`], 'is-valid': !v$.data.country_id.$invalid && !errors[`country_id`] }]">
                                </Select>
                                <div class="invalid-feedback">
                                    <span v-if="v$.data.country_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br /></span>
                                </div>
                                <template v-if="errors['country_id']">
                                    <error-message v-for="(errorMessage, index) in errors['country_id']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    {{ $t('global.name') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg" v-model="v$.data.name.$model"
                                    :class="{
                                        'is-invalid': v$.data.name.$error || errors[`name`],
                                        'is-valid': !v$.data.name.$invalid && !errors[`name`]
                                    }">

                                <div class="invalid-feedback">
                                    <span v-if="v$.data.name.required.$invalid">{{ $t('validation.fieldRequired')
                                        }}<br />
                                    </span>
                                    <span v-if="v$.data.name.minLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtLeast') }} {{
                                            v$.data.name.minLength.$params.min
                                        }} {{ $t('validation.Letters') }} <br />
                                    </span>
                                    <span v-if="v$.data.name.maxLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtMost') }} {{
                                            v$.data.name.maxLength.$params.max
                                        }} {{ $t('validation.Letters') }}
                                    </span>
                                </div>
                                <template v-if="errors[`name`]">
                                    <error-message v-for="(errorMessage, index) in errors[`name`]" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    {{ $t('global.manager_name') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg"
                                    v-model="v$.data.manager_name.$model" :class="{
                                        'is-invalid': v$.data.manager_name.$error || errors[`manager_name`],
                                        'is-valid': !v$.data.manager_name.$invalid && !errors[`manager_name`]
                                    }">

                                <div class="invalid-feedback">
                                    <span v-if="v$.data.manager_name.required.$invalid">{{
                                        $t('validation.fieldRequired') }}<br />
                                    </span>
                                    <span v-if="v$.data.manager_name.minLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtLeast') }} {{
                                            v$.data.manager_name.minLength.$params.min
                                        }} {{ $t('validation.Letters') }} <br />
                                    </span>
                                    <span v-if="v$.data.manager_name.maxLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtMost') }} {{
                                            v$.data.manager_name.maxLength.$params.max
                                        }} {{ $t('validation.Letters') }}
                                    </span>
                                </div>
                                <template v-if="errors[`manager_name`]">
                                    <error-message v-for="(errorMessage, index) in errors[`manager_name`]" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">
                                    {{ `${$t('global.email')}` }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control form-control-lg"
                                    v-model.trim="v$.data.email.$model"
                                    :class="{ 'is-invalid': v$.data.email.$error || errors[`email`], 'is-valid': !v$.data.email.$invalid && !errors[`email`] }">

                                <div class="invalid-feedback">
                                    <span v-if="v$.data.email.required.$invalid">{{
                                        $t('global.EmailIsRequired') }} <br /></span>
                                    <span v-if="v$.data.email.email.$invalid">{{
                                        $t('global.ThisFieldMastBeEmail') }} <br /></span>
                                </div>
                                <template v-if="errors['email']">
                                    <error-message v-for="(errorMessage, index) in errors['email']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">

                                <label class="form-label"></label>

                                <label class="form-label">
                                    {{ `${$t('global.Mobile number, including country code')}` }}
                                    <span class="text-danger">*</span>
                                </label>
                                <vue-tel-input @validate="phoneValidation" v-model="v$.data.phone.$model"
                                    defaultCountry="AE" :placeholder="'REE'" :onlyCountries="['SA','EG','AE','QA','KW']" autocomplete="off"
                                    :styleClasses="['form-control', { 'is-invalid': v$.data.phone.$error || !is_valid || errors[`phone`], 'is-valid': !v$.data.phone.$invalid && !errors[`phone`] && is_valid }]"></vue-tel-input>
                                <div class="invalid-feedback">
                                    <span v-if="v$.data.phone.required.$invalid">{{ $t('global.PhoneIsRequired') }}
                                        <br /></span>
                                    <span
                                        v-if="v$.data.phone.integer.$invalid || v$.data.phone.maxLength.$invalid || !is_valid">{{
                                            $t('global.PhoneIsMustHaveAtLeast')
                                        }} <br /></span>
                                </div>
                                <template v-if="errors['phone']">
                                    <error-message v-for="(errorMessage, index) in errors['phone']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ $t('global.password') }} <span
                                        class="text-danger">*</span></label>
                                <input type="password" v-model.trim="v$.data.password.$model"
                                    :class="['form-control  form-control-lg', { 'is-invalid': v$.data.password.$error || errors[`password`], 'is-valid': !v$.data.password.$invalid && !errors[`password`] }]">


                                <div class="invalid-feedback">
                                    <span v-if="v$.data.password.required.$invalid">{{ $t('global.PasswordIsRequired')
                                        }}<br />
                                    </span>
                                    <span v-if="v$.data.password.alphaNum.$invalid">{{
                                        $t('global.MustBeLettersOrNumbers') }}
                                        <br /></span>
                                    <span v-if="v$.data.password.minLength.$invalid">{{
                                        $t('global.PasswordIsMustHaveAtLeast') }}
                                        {{
                                            v$.data.password.minLength.$params.min
                                        }} {{ $t('global.Letters') }} <br /></span>
                                    <span v-if="v$.data.password.maxLength.$invalid">{{
                                        $t('global.PasswordIsMustHaveAtMost') }}
                                        {{
                                            v$.data.password.maxLength.$params.max
                                        }} {{ $t('global.Letters') }} </span>
                                </div>
                                <template v-if="errors['password']">
                                    <error-message v-for="(errorMessage, index) in errors['password']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">{{ $t('global.password_confirmation') }} <span
                                        class="text-danger">*</span></label>
                                <input type="password" v-model.trim="v$.data.confirmation.$model"
                                    :class="['form-control form-control-lg', { 'is-invalid': v$.data.confirmation.$error || errors[`confirmation`], 'is-valid': !v$.data.confirmation.$invalid && !errors[`confirmation`] }]">


                                <div class="invalid-feedback">
                                    <span v-if="v$.data.confirmation.required.$invalid">{{
                                        $t('global.ConfirmIsRequired') }}<br />
                                    </span>
                                    <span v-if="v$.data.confirmation.sameAs.$invalid">{{
                                        $t('global.ConfirmationMustMatchPassword') }}
                                        <br /></span>
                                </div>
                                <template v-if="errors['confirmation']">
                                    <error-message v-for="(errorMessage, index) in errors['confirmation']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>


                            <div class="col-12 my-2">

                                <label class="form-label">{{ $t('global.How did you learn about Us?') }}</label>

                                <Select v-model="v$.data.learn_about_id.$model" :filterFields="['id', 'title']"
                                    :options="howYouKnowAboutUs" filter
                                    :invalid="v$.data.learn_about_id.$error || errors[`learn_about_id`]"
                                    optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.data.learn_about_id.$error || errors[`learn_about_id`], 'is-valid': !v$.data.learn_about_id.$invalid && !errors[`learn_about_id`] }]">

                                </Select>

                                <div class="invalid-feedback">
                                    <span v-if="v$.data.learn_about_id.$error">{{ $t('global.You must select one option') }}<br />
                                    </span>

                                </div>

                                <template v-if="errors['learn_about_id']">
                                    <error-message v-for="(errorMessage, index) in errors['learn_about_id']"
                                        :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>

                            </div>



                            <div class="col-xl-12 d-grid mt-2 text-center">
                                <button type="button" @click.prevent="AddSubmit" class="btn btn-lg btn-primary" v-if="!loading" style="background-color: #fbc02d;">{{
                                    $t('auth.SignUp') }}</button>
                                     <button class="btn btn-primary btn-loader" style="cursor: not-allowed" disabled v-else>
                                            <span class="me-2">{{ $t('auth.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="fs-12 text-muted mt-3">
                                {{ $t('auth.IAlreadyHaveAnAccount') }}
                                <a  href="/login" class="fw-semibold text-primary"
                                    style="text-decoration: underline;">
                                    {{ $t('auth.signIn') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End::row-1 -->

    <!-- End::app-content -->
</template>

<script>
import { computed, reactive, ref, toRefs, onMounted, watch } from "vue";
import {
    alphaNum,
    email,
    maxLength,
    minLength,
    required,
    sameAs,
} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../api/webAxios";
import { useI18n } from "vue-i18n";


export default {
    name: "register",

    setup() {

        const errors = ref([]);
        const countries = ref([]);
        const howYouKnowAboutUs = ref([]);
        let loading = ref(false);
        const { t } = useI18n({});
        let is_valid = ref(true);


        let getCountries = () => {
            webApi.get(`/web/countries`)
                .then((res) => {
                    countries.value = res.data.data;
                })
                .catch((err) => {
                })
        }
        let getHowYouKnowAboutUs = () => {
            webApi.get(`/web/how-you-know-about-us`)
                .then((res) => {
                    howYouKnowAboutUs.value = res.data.data;
                })
                .catch((err) => {
                })
        }


        let submitdata = reactive({
            data: {
                name: "",
                manager_name: "",
                email: '',
                password: '',
                confirmation: '',
                phone: '',
                code_country: '',
                country_id: null,
                learn_about_id: null,
            },
        });

        const mustBeCoolPhone = (value) => value.match(/[0-9 ]{12}/);

        const rules = computed(() => {
            return {
                data: {
                    name: {
                        minLength: minLength(2),
                        maxLength: maxLength(70),
                        required,
                    },
                    manager_name: {
                        minLength: minLength(2),
                        maxLength: maxLength(70),
                        required,
                    },
                    password: {
                        required,
                        minLength: minLength(8),
                        maxLength: maxLength(16),
                        alphaNum
                    },
                    confirmation: {
                        required,
                        sameAs: sameAs(submitdata.data.password)
                    },
                    phone: {
                        required,
                        maxLength: maxLength(12),
                        integer: mustBeCoolPhone
                    },
                    email: {
                        email,
                        required
                    },
                    country_id: {
                        required
                    },
                    learn_about_id: {
                        required
                    },
                },
            }
        });

        const v$ = useVuelidate(rules, submitdata);

        onMounted(() => {
            getCountries();
            getHowYouKnowAboutUs();
        });

        setTimeout(() => {
            is_valid.value = true;
        }, 200);

        const phoneValidation = (e) => {
            is_valid.value = e.valid;
            submitdata.data.code_country = e.countryCallingCode;
        }

        return {
            v$, ...toRefs(submitdata), loading, errors, countries
            , is_valid, howYouKnowAboutUs, t, phoneValidation,
        }
    },
    methods: {
        AddSubmit() {

            this.v$.$validate();
            this.errors = {};

            if (!this.v$.$error && this.is_valid) {

                let formData = new FormData();
                formData.append('name', this.data.name);
                formData.append('manager_name', this.data.manager_name);
                formData.append('learn_about_id', this.data.learn_about_id);
                formData.append('email', this.data.email);
                formData.append('password', this.data.password);
                formData.append('confirmation', this.data.confirmation);
                formData.append('phone', `+${this.data.code_country}`+this.data.phone);
                formData.append('country_id', this.data.country_id);

                this.loading = true;
                webApi.post(`/web/register`, formData)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            // title: `${this.t('global.TheDataHasBeenSentSuccessfullyAndYouWillBeRespondedToByCustomerServiceSoon')}`,
                            title: `The data has been sent successfully`,
                            showConfirmButton: false,
                            timer: 6000
                        });

                        setTimeout(() => window.location='/', 5000);

                    })
                    .catch((err) => {
                        this.loading = false;
                        if (err) {
                            if (err.response) {
                                if (err.response.data) {
                                    this.errors = err.response.data.errors;
                                }
                            }
                        }
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            } else {
                this.loading = false;
            }
        }
    }
}
</script>

<style scoped>
.register-background {
    background-color: #F9F9F9;
}

.register-border-radius {
    border-radius: 16px;
}

.text-primary {
    color: #fbc02d !important;
}

.btn-primary {
    background-color: #fbc02d !important;
    border-color: #fbc02d !important;
}

.coustom-select {
    height: 100px;
}

.card {
    position: relative;
}

.package-feature ul li:first-child {
    margin-top: 10px;
}

.package-feature ul li::before {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    color: #4B9F18;
    left: 0;
    position: absolute;
    top: 0;
}

.package-feature ul li:last-child {
    margin-bottom: 10px;
}

.ml-3 {
    margin-left: 1.5rem;
}

.waves-effect {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    width: 200px;
    height: 50px;
    text-align: center;
    line-height: 34px;
    margin: auto;
}

input[type="file"] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
}

.num-of-files {
    text-align: center;
    margin: 20px 0 30px;
}

.container-images {
    width: 90%;
    position: relative;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    gap: 20px;
    flex-wrap: wrap;
    padding: 10px;
    border-radius: 20px;
    background-color: #f7f7f7;
}

.vue-tel-input {
    border-color: #e9edf6;
}

.authentication-cover:before {
    background-color: #fbc02d;
}

.text-primary {
    color: #fbc02d !important;
}

.btn-primary {
    background-color: #fbc02d !important;
    border-color: #fbc02d !important;
}

/*.tab-style-3 .nav-item .nav-link.services:after {*/
/*    content: "3";*/
/*}*/

.nav {
    margin-bottom: 60px;
}

.nav-item {
    padding: 0 30px;
}

.tab-style-3 .nav-item .nav-link {
    font-size: large;
}

.tab-pane {
    padding: .5rem 3.5rem 2rem;
    background: #d3bdbd14;
    border: none;
    border-bottom-width: 1px !important;
    border-bottom-color: #f1f1f1;
    border-bottom-style: solid;
    border-top-width: 1px !important;
    border-top-color: #f1f1f1;
    border-top-style: solid;
    height: 785px;
    max-height: 785px;
    border-radius: unset;
    overflow-y: scroll;
}

.p-select {
    border: 1px solid #e9edf6;
}

.tab-style-3 .nav-item .nav-link.images:after {
    content: "4";
}

.tab-style-3 .nav-item .nav-link.terms:after {
    content: "5";
}

.nav-tabs .nav-link.disabled,
.nav-tabs .nav-link:disabled {
    color: rgb(35, 35, 35);
}

.nav-tabs .nav-link.disabled,
.nav-tabs .nav-link:disabled {
    opacity: 1;
}

.active-data {
    color: #fbc02d !important;
    opacity: 1;
}

.bottom-footer {
    width: 57%;
    position: fixed;
    bottom: 0;
    transform: translate(5%, 0);
    background: #fff;
    z-index: 1200;
}

.waves-effect[data-v-d8970579] {
    background-color: #e9e9e9;
}

@media only screen and (max-width: 1560px) {
    .dd-step {
        margin-top: 3rem;
    }
}
</style>
