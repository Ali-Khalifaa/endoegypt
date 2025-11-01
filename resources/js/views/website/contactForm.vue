<template>
    <!-- Start::app-content -->


    <!-- Start::row-1 -->
    <div class="col-xxl-12 col-xl-12 col-lg-12 my-5">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xl-12 col-lg-5 col-md-6 col-sm-8 col-12 px-0">
                <div class="card">
                    <div class="card-body p-5">
                        <p class="h5 fw-semibold mb-2 text-center my-4">{{ $t('global.Contact Us') }}</p>

                        <div class="row gy-3">
                           
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">
                                <label class="form-label">
                                    {{ $t('global.subject') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg"
                                    v-model="v$.data.subject.$model" :class="{
                                        'is-invalid': v$.data.subject.$error || errors[`subject`],
                                        'is-valid': !v$.data.subject.$invalid && !errors[`subject`]
                                    }">

                                <div class="invalid-feedback">
                                    <span v-if="v$.data.subject.required.$invalid">{{
                                        $t('validation.fieldRequired') }}<br />
                                    </span>
                                    <span v-if="v$.data.subject.minLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtLeast') }} {{
                                            v$.data.subject.minLength.$params.min
                                        }} {{ $t('validation.Letters') }} <br />
                                    </span>
                                    <span v-if="v$.data.subject.maxLength.$invalid">{{
                                        $t('validation.TitleIsMustHaveAtMost') }} {{
                                            v$.data.subject.maxLength.$params.max
                                        }} {{ $t('validation.Letters') }}
                                    </span>
                                </div>
                                <template v-if="errors[`subject`]">
                                    <error-message v-for="(errorMessage, index) in errors[`subject`]" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-6 mb-4">
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
                            <div class="col-md-6 mb-4">

                                <label class="form-label"></label>

                                <label class="form-label">
                                    {{ `${$t('global.Mobile number, including country code')}` }}
                                    <span class="text-danger">*</span>
                                </label>
                                <vue-tel-input @validate="phoneValidation" v-model="v$.data.phone.$model"
                                    defaultCountry="AE" :placeholder="'REE'" :onlyCountries="['SA','EG','AE','QA','KW']" autocomplete="off"
                                    :styleClasses="['form-control', { 'is-invalid': v$.data.phone.$error || (!is_valid && is_valid != undefined) || errors[`phone`], 'is-valid': !v$.data.phone.$error && !errors[`phone`] && is_valid && data.phone}]"></vue-tel-input>
                                <div class="invalid-feedback">
                                    <span v-if="v$.data.phone.required.$error">{{ $t('global.PhoneIsRequired') }}
                                        <br /></span>
                                    <span
                                        v-if="v$.data.phone.integer.$error || v$.data.phone.maxLength.$error || (!is_valid && is_valid != undefined)">{{
                                            $t('global.PhoneIsMustHaveAtLeast')
                                        }} <br /></span>
                                </div>
                                <template v-if="errors['phone']">
                                    <error-message v-for="(errorMessage, index) in errors['phone']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">
                                    {{ `${$t('global.message')}` }}
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control form-control-lg" rows="6" v-model="v$.data.message.$model"
                                    :class="{
                                        'is-invalid': v$.data.message.$error || errors[`message`],
                                        'is-valid': !v$.data.message.$invalid && !errors[`message`]
                                    }"></textarea>
                                <div class="invalid-feedback">
                                    <span v-if="v$.data.message.required.$invalid">{{ $t('validation.fieldRequired')
                                        }}<br />
                                    </span>
                                </div>
                                <template v-if="errors[`message`]">
                                    <error-message v-for="(errorMessage, index) in errors[`message`]" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                            </div>
                               
                           



                            <div class="col-xl-12 d-grid mt-2 text-center">
                                <button type="button" @click.prevent="AddSubmit" class="btn btn-lg btn-primary" v-if="!loading" style="background-color: #fbc02d;">{{
                                    $t('global.Submit') }}</button>
                                     <button class="btn btn-primary btn-loader" style="cursor: not-allowed" disabled v-else>
                                            <span class="me-2">{{ $t('auth.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                            </div>
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
import { computed, reactive, ref, toRefs, onMounted, nextTick } from "vue";
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
        let loading = ref(false);
        const { t } = useI18n({});
        let is_valid = ref(true);


        let submitdata = reactive({
            data: {
                name: "",
                subject: "",
                email: '',
                message: '',
                phone: '',
      
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
                    subject: {
                        minLength: minLength(2),
                        maxLength: maxLength(70),
                        required,
                    },
                    message: {
                        required,
                    },
                    code_country: {
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
                },
            }
        });

        const v$ = useVuelidate(rules, submitdata);


        setTimeout(() => {
            is_valid.value = true;
        }, 200);

        const phoneValidation = (e) => {
            is_valid.value = e.valid;
            submitdata.data.code_country = e.countryCallingCode;
        }
        function resetModal()
        {
            nextTick(() => { v$.value.$reset() });
        }

        return {
            v$, ...toRefs(submitdata), loading, errors
            , is_valid, t, phoneValidation,resetModal
        }
    },
    methods: {
        AddSubmit() {

            this.v$.$validate();
            this.errors = {};

            if (!this.v$.$error && this.is_valid) {

                let formData = new FormData();
                formData.append('name', this.data.name);
                formData.append('subject', this.data.subject);
                formData.append('message', this.data.message);
                formData.append('email', this.data.email);
                formData.append('phone', `+${this.data.code_country}`+this.data.phone);

                this.loading = true;
                webApi.post(`/web/contact-us`, formData)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            // title: `${this.t('global.TheDataHasBeenSentSuccessfullyAndYouWillBeRespondedToByCustomerServiceSoon')}`,
                            title: res.data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        this.data =  {
                            name: "",
                            subject: "",
                            email: '',
                            message: '',
                            phone: '',
                        };

                        this.errors =  [];
                        this.is_valid =  true;
                        this.resetModal();

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
