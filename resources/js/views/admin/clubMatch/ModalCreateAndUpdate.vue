<template>
    <div class="modal fade" id="category-service" tabindex="-1"
         aria-labelledby="exampleModalLgLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLgLabel">
                        {{type == 'create' ? $t('global.add') : $t('global.update')}}
                    </h6>
                    <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12 ">
                            <label class="form-label">{{ $t('global.championship') }}</label>

                            <Select v-model="data.champion_award_id" :filterFields="['id','title']" :options="champions" filter
                                    :invalid="v$.champion_award_id.$error || errors[`champion_award_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.champion_award_id.$error || errors[`champion_award_id`], 'is-valid': !v$.champion_award_id.$invalid && !errors[`champion_award_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.champion_award_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['champion_award_id']">
                                <error-message v-for="(errorMessage, index) in errors['champion_award_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">{{ $t('global.club1') }}</label>

                            <Select v-model="data.club1_id" :filterFields="['id','title']" :options="colors" filter
                                    :invalid="v$.club1_id.$error || errors[`club1_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.club1_id.$error || errors[`club1_id`], 'is-valid': !v$.club1_id.$invalid && !errors[`club1_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.club1_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['club1_id']">
                                <error-message v-for="(errorMessage, index) in errors['club1_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">{{ $t('global.club2') }}</label>

                            <Select v-model="data.club2_id" :filterFields="['id','title']" :options="colors" filter
                                    :invalid="v$.club2_id.$error || errors[`club2_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.club2_id.$error || errors[`club2_id`], 'is-valid': !v$.club2_id.$invalid && !errors[`club2_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.club2_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['club2_id']">
                                <error-message v-for="(errorMessage, index) in errors['club2_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">{{$t('global.match_date')}}</label>
                            <div class="input-group">
                                <div class="input-group-text text-muted"> <i class="ri-calendar-line"></i> </div>
                                <input type="text" class="form-control" id="datetime" :placeholder="$t('global.match_date')"
                                       v-model.trim="v$.match_date.$model"
                                       :class="{'is-invalid': v$.match_date.$error ||errors[`match_date`],
                                        'is-valid':!v$.match_date.$invalid && !errors[`match_date`]}">
                            </div>
                            <div class="invalid-feedback">
                                <span v-if="v$.match_date.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                            </div>
                            <template v-if="errors['match_date']">
                                <error-message v-for="(errorMessage, index) in errors['match_date']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">{{$t('global.match_link')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" :placeholder="$t('global.match_link')"
                                       v-model.trim="v$.match_link.$model"
                                       :class="{'is-invalid': v$.match_link.$error ||errors[`match_link`],
                                        'is-valid':!v$.match_link.$invalid && !errors[`match_link`]}">
                            </div>
                            <div class="invalid-feedback">
                                <span v-if="v$.match_link.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                            </div>
                            <template v-if="errors['match_link']">
                                <error-message v-for="(errorMessage, index) in errors['match_link']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6" v-if="data.ar" v-for="lang in languages">
                            <label class="form-label">{{ $t('global.stadium') }} ({{lang.title}})</label>
                            <input type="text" class="form-control"  v-model="v$[lang.code].title.$model"
                                   :placeholder="$t('global.stadium')+' '+lang.title"
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


                    </div>
                </div>
                <div class="modal-footer">
                    <button v-if="type != 'edit'" :disabled="!is_disabled"
                            @click.prevent="resetModal" type="button" class="btn btn-secondary">{{$t('global.AddNewRecord')}}</button>
                    <template v-if="!is_disabled">
                        <button type="submit" v-if="!loading" @click.prevent="AddSubmit" class="btn btn-primary">{{ $t('global.Submit') }}</button>

                        <button class="btn btn-primary btn-loader" v-else>
                            <span class="me-2">{{$t('global.Loading')}}</span>
                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive, ref, toRefs, watch,nextTick} from "vue";
import {useI18n} from "vue-i18n";
import {maxLength, minLength, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import adminApi from "../../../api/adminAxios";

export default {
    name: "Matches",
    props: {
        type: {default: 'create'},
        dataRow: {default: ''},
    },
    data(){
        return {
            errors:{}
        }
    },
    setup(props){
        setTimeout(async () => {
            let myModalEl = document.getElementById('category-service')
            myModalEl.addEventListener('show.bs.modal', function (event) {
                resetModal();
            })
            myModalEl.addEventListener('hidden.bs.modal', function (event) {
                resetModalHidden();
            })
        }, 150);
        const errors = ref([]);
        const languages = ref([]);
        const langValidation = ref({});
        let loading = ref(false);
        let is_disabled = ref(false);
        const {t} = useI18n({});
        const id = ref(null);
        const colors = ref([]);
        const champions = ref([]);

        onMounted(()=>{
            flatpickr("#datetime", {
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
            languages.value=JSON.parse(localStorage.getItem('languages'));
        });

       function defaultData(){
        languages.value.forEach((el)=>{
               submitdata.data[el.code]={title:'',description:'',};
               langValidation.value[el.code] ={
                   title: {minLength: minLength(1),required,}
               }
           });

           submitdata.data.match_link = '';
           submitdata.data.match_date = '';
           submitdata.data.club1_id = '';
           submitdata.data.club2_id = '';
           submitdata.data.champion_award_id = '';
           is_disabled.value = false;
           loading.value = false;
           errors.value = [];
        }
        let getClubs = () => {
            loading.value = true;

            adminApi.get(`dashboard/club-team-dropdown`)
                .then((res) => {
                    let l = res.data.data;
                    colors.value = l;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        }
        let getChampion = () => {
            loading.value = true;

            adminApi.get(`dashboard/champion-award-dropdown`)
                .then((res) => {
                    let l = res.data.data;
                    champions.value = l;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        }
       function resetModal() {
            defaultData();
            setTimeout(async () => {
                getClubs();
                getChampion();
                if (props.type != 'edit') {
                } else {
                    id.value = props.dataRow.id;
                    adminApi.get(`dashboard/club-match/${id.value}`)
                    .then((res) => {
                        loading.value = true;
                        let l = res.data.data;
                        l.translations.forEach((el)=>{
                            submitdata.data[el.locale]={
                                title:el.title,
                            }
                        });
                        submitdata.data.match_link = l.match_link;
                        submitdata.data.match_date = l.match_date;
                        submitdata.data.club1_id = l.club1_id;
                        submitdata.data.club2_id = l.club2_id;
                        submitdata.data.champion_award_id = l.champion_award_id;
                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => {
                        loading.value = false;
                    });
                }
            }, 50);
        }
       function resetModalHidden()
        {
            defaultData();
            nextTick(() => { v$.value.$reset() });
        }

        //start design
        let submitdata =  reactive({
            data:{
                match_link: '',
                match_date: '',
                club1_id: '',
                club2_id: '',
                champion_award_id: '',
            }
        });

        const rules = computed(() => {
            return {
                ...langValidation.value,
                match_link: {required},
                match_date: {required},
                club1_id: {required},
                club2_id: {required},
                champion_award_id: {required},
            }
        });

        const v$ = useVuelidate(rules,submitdata.data);

        return {t,id,
            loading,is_disabled,colors,champions,languages,
            resetModal,resetModalHidden
            ,...toRefs(submitdata),
            v$,errors};
    },
    methods: {
        AddSubmit() {

        this.v$.$validate();
        this.errors = {};

        let formData = new FormData();
        this.languages.forEach((el)=>{
           formData.append(`translations[${el.code}][title]`, this.data[el.code].title);
       })
        formData.append('match_link', this.data.match_link);
        formData.append('match_date', this.data.match_date);
        formData.append('club1_id', this.data.club1_id);
        formData.append('club2_id', this.data.club2_id);
        formData.append('champion_award_id', this.data.champion_award_id);

        if (this.type !== 'edit') {
            if (!this.v$.$error) {
                this.is_disabled = false;
                this.loading = true;
                adminApi.post(`dashboard/club-match`, formData)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: `${this.t('global.AddedSuccessfully')}`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    })
                    .finally(() => {
                        if (Object.keys(this.errors).length === 0) {
                                this.loading = false;
                                this.is_disabled = true;
                                this.$emit("created");
                        } else {
                            this.loading = false;
                            this.is_disabled = false;
                        }
                    });
            }
        }else if(!this.v$.$error) {
            this.is_disabled = false;
            this.loading = true;
            formData.append('_method','PUT');
            adminApi.post(`dashboard/club-match/${this.id}`,formData)
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
                    this.$emit("created");
                });
        }

}
    }
}
</script>

<style scoped>
.coustom-select {
    height: 100px;
}
.card{
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

.ml-3{
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

.num-of-files{
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
</style>
