<template>
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">{{ $t('global.contactUs') }}</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><router-link :to="{name: 'dashboard'}">{{$t('global.home')}}</router-link></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $t('global.contactUs') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header Close -->
        <div class="card custom-card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" v-if="data.ar" v-for="lang in languages">
                        <label class="form-label">{{ $t('label.title') }} ({{lang.title}})</label>
                        <input type="text" class="form-control"  v-model="v$[lang.code].title.$model"
                               :placeholder="$t('label.title')+' '+lang.title"
                               :class="{'is-invalid': v$[lang.code].title.$error || errors[`translations.${lang.code}.title`],
                               'is-valid': !v$[lang.code].title.$invalid && !errors[`translations.${lang.code}.title`]}">

                        <div class="invalid-feedback">
                            <span v-if="v$[lang.code].title.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                            <span v-if="v$[lang.code].title.minLength.$invalid">{{ $t('validation.TitleIsMustHaveAtLeast') }} {{
                                    v$[lang.code].title.minLength.$params.min
                                }} {{ $t('validation.Letters') }} <br />
                            </span>
                        </div>
                        <template v-if="errors[`translations.${lang.code}.title`]">
                            <error-message v-for="(errorMessage, index) in errors[`translations.${lang.code}.title`]" :key="index">
                                {{ errorMessage }}
                            </error-message>
                        </template>
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="phone_one" class="form-label">{{$t('global.phone_one')}}</label>
                        <input type="text" class="form-control" id="phone_one" :placeholder="$t('global.phone_one')"
                            v-model.trim="v$.phone_one.$model"
                            :class="{'is-invalid': v$.phone_one.$error ||errors[`phone_one`],
                            'is-valid':!v$.phone_one.$invalid && !errors[`phone_one`]}">
                        <div class="invalid-feedback">
                            <span v-if="v$.phone_one.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                        </div>
                        <template v-if="errors['phone_one']">
                            <error-message v-for="(errorMessage, index) in errors['phone_one']" :key="index">
                                {{ errorMessage }}
                            </error-message>
                        </template>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="phone_two" class="form-label">{{$t('global.phone_two')}}</label>
                        <input type="text" class="form-control" id="phone_two" :placeholder="$t('global.phone_two')"
                            v-model.trim="v$.phone_two.$model"
                            :class="{'is-invalid': v$.phone_two.$error ||errors[`phone_two`],
                            'is-valid':!v$.phone_two.$invalid && !errors[`phone_two`]}">
                        <div class="invalid-feedback">
                            <span v-if="v$.phone_two.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                        </div>
                        <template v-if="errors['phone_two']">
                            <error-message v-for="(errorMessage, index) in errors['phone_two']" :key="index">
                                {{ errorMessage }}
                            </error-message>
                        </template>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email_one" class="form-label">{{$t('global.email_one')}}</label>
                        <input type="text" class="form-control" id="email_one" :placeholder="$t('global.email_one')"
                            v-model.trim="v$.email_one.$model"
                            :class="{'is-invalid': v$.email_one.$error ||errors[`email_one`],
                            'is-valid':!v$.email_one.$invalid && !errors[`email_one`]}">
                        <div class="invalid-feedback">
                            <span v-if="v$.email_one.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                        </div>
                        <template v-if="errors['email_one']">
                            <error-message v-for="(errorMessage, index) in errors['email_one']" :key="index">
                                {{ errorMessage }}
                            </error-message>
                        </template>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="email_two" class="form-label">{{$t('global.email_two')}}</label>
                        <input type="text" class="form-control" id="email_two" :placeholder="$t('global.email_two')"
                            v-model.trim="v$.email_two.$model"
                            :class="{'is-invalid': v$.email_two.$error ||errors[`email_two`],
                            'is-valid':!v$.email_two.$invalid && !errors[`email_two`]}">
                        <div class="invalid-feedback">
                            <span v-if="v$.email_two.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                        </div>
                        <template v-if="errors['email_two']">
                            <error-message v-for="(errorMessage, index) in errors['email_two']" :key="index">
                                {{ errorMessage }}
                            </error-message>
                        </template>
                    </div>
                    <div class="col-md-12 mt-3 mb-3 d-flex justify-content-end">
                        <button type="submit" v-if="!loading" @click.prevent="AddSubmit" class="btn btn-primary">{{ $t('global.Submit') }}</button>
                        <button class="btn btn-primary btn-loader" v-else>
                            <span class="me-2">{{$t('global.Loading')}}</span>
                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive, ref, toRefs, watch,onBeforeMount} from "vue";
import {useI18n} from "vue-i18n";
import {maxLength, minLength, required,numeric} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import adminApi from "../../../api/adminAxios";

export default {
    name: "contactUs",
    data(){
        return {
            errors:{}
        }
    },
    setup(){
        const errors = ref([]);
        const languages = ref([]);
        const langValidation = ref({});
        let loading = ref(false);
        const {t} = useI18n({});
        const id = ref(1);

        onMounted(()=>{
            languages.value=JSON.parse(localStorage.getItem('languages'));
            resetModal();
        });

        function defaultData(){

            languages.value.forEach((el)=>{
               submitdata.data[el.code]={title:''};
               langValidation.value[el.code] ={
                   title: {minLength: minLength(1),required,}
               }
           });

           submitdata.data.phone_one = '';
           submitdata.data.phone_two = '';
           submitdata.data.email_one = '';
           submitdata.data.email_two = '';

           loading.value = false;
           errors.value = [];
        }
       function resetModal() {
            defaultData();
            setTimeout(async () => {
                adminApi.get(`dashboard/contact-us/${id.value}`)
                    .then((res) => {
                        loading.value = true;
                        let l = res.data.data;

                        l.translations.forEach((el)=>{
                            submitdata.data[el.locale]={
                                title:el.title,
                            }
                        });

                        submitdata.data.phone_one = l.phone_one;
                        submitdata.data.phone_two = l.phone_two;
                        submitdata.data.email_one = l.email_one;
                        submitdata.data.email_two = l.email_two;

                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => {
                        loading.value = false;
                    })

            }, 50);
        }

        // onBeforeMount(() => {
        //     resetModal();
        // });

         //start design
         let submitdata =  reactive({
            data:{
                phone_one: '',
                phone_two:'',
                email_one:'',
                email_two:'',
            }
        });

        const rules = computed(() => {
            return {
                ...langValidation.value,
                phone_one: {required},
                phone_two: {required},
                email_one: {required},
                email_two: {required},
            }
        });

        const v$ = useVuelidate(rules,submitdata.data);

        return {t,id,loading,languages,resetModal,...toRefs(submitdata),v$,errors};

    },
    methods: {
        AddSubmit() {

        this.v$.$validate();
        this.errors = {};

        let formData = new FormData();
        this.languages.forEach((el)=>{
            formData.append(`translations[${el.code}][title]`, this.data[el.code].title);
        });
            formData.append('phone_one', this.data.phone_one);
            formData.append('phone_two', this.data.phone_two);
            formData.append('email_one', this.data.email_one);
            formData.append('email_two', this.data.email_two);

            formData.append('_method','PUT');
        if(!this.v$.$error) {
            this.loading = true;
            adminApi.post(`dashboard/contact-us/${this.id}`,formData)
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: `${this.t('global.EditSuccessfully')}`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                    this.errors = err.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });
        }

        }
    }
}
</script>

