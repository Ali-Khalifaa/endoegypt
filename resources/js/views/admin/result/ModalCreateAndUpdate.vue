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

                            <Select @change="getClubs('')" v-model="data.champion_award_id" :filterFields="['id','title']" :options="champions" filter
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

                        <div class="col-md-12 ">
                            <label class="form-label">{{ $t('global.match') }}</label>

                            <Select v-model="data.club_match_id" :filterFields="['id']" :options="colors" filter
                                    :invalid="v$.club_match_id.$error || errors[`club_match_id`]"
                                     optionLabel="club1" optionValue="id" :style="{ height: '50px' }"
                                    :class="['w-full w-100', { 'is-invalid': v$.club_match_id.$error || errors[`club_match_id`], 'is-valid': !v$.club_match_id.$invalid && !errors[`club_match_id`] }]">
                                    <template #value="slotProps">
                                        <div v-if="slotProps.value" class="p-0">

                                            <div class="d-inline px-2">{{"(club 1) " + colors.find(color => color.id === slotProps.value)?.club1}}</div>
                                            <img :alt="colors.find(color => color.id === slotProps.value)?.club1" :src="colors.find(color => color.id === slotProps.value)?.club1_image" :class="`mr-2`"
                                            style="width: 40px;border-radius: 50%;" />
                                                <div class="d-inline px-2">{{" VS " }}</div>
                                                <img :alt="colors.find(color => color.id === slotProps.value)?.club2" :src="colors.find(color => color.id === slotProps.value)?.club2_image" :class="`mr-2`"
                                            style="width: 40px;border-radius: 50%;" />
                                            <div class="d-inline px-2">{{"(club 2) " + colors.find(color => color.id === slotProps.value)?.club2 }}</div>
                                        </div>
                                        <span v-else>
                                            {{ slotProps.placeholder }}
                                        </span>
                                    </template>
                                    <template #option="slotProps">
                                        <div class="p-0">
                                            <div class="d-inline px-2">{{"(club 1) " + slotProps.option.club1}}</div>
                                            <img :alt="slotProps.option.club1" :src="slotProps.option.club1_image" :class="`mr-2`"
                                            style="width: 40px;border-radius: 50%;" />
                                                <div class="d-inline px-2">{{" VS " }}</div>
                                                <img :alt="slotProps.option.club2" :src="slotProps.option.club2_image" :class="`mr-2`"
                                            style="width: 40px;border-radius: 50%;" />
                                            <div class="d-inline px-2">{{"(club 2) " + slotProps.option.club2 }}</div>
                                        </div>
                                    </template>

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.club_match_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['club_match_id']">
                                <error-message v-for="(errorMessage, index) in errors['club_match_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">{{$t('global.club1_result')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" :placeholder="$t('global.club1_result')"
                                       v-model.trim="v$.club1_result.$model"
                                       :class="{'is-invalid': v$.club1_result.$error ||errors[`club1_result`],
                                        'is-valid':!v$.club1_result.$invalid && !errors[`club1_result`]}">
                            </div>
                            <div class="invalid-feedback">
                                <span v-if="v$.club1_result.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                            </div>
                            <template v-if="errors['club1_result']">
                                <error-message v-for="(errorMessage, index) in errors['club1_result']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label">{{$t('global.club2_result')}}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" :placeholder="$t('global.club2_result')"
                                       v-model.trim="v$.club2_result.$model"
                                       :class="{'is-invalid': v$.club2_result.$error ||errors[`club2_result`],
                                        'is-valid':!v$.club2_result.$invalid && !errors[`club2_result`]}">
                            </div>
                            <div class="invalid-feedback">
                                <span v-if="v$.club2_result.required.$invalid">{{ $t('validation.fieldRequired') }}<br /> </span>
                            </div>
                            <template v-if="errors['club2_result']">
                                <error-message v-for="(errorMessage, index) in errors['club2_result']" :key="index">
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
        let loading = ref(false);
        let is_disabled = ref(false);
        const {t} = useI18n({});
        const id = ref(null);
        const colors = ref([]);
        const champions = ref([]);

        onMounted(()=>{

        });

       function defaultData(){
           submitdata.data.club2_result = '';
           submitdata.data.club1_result = '';
           submitdata.data.club_match_id = '';
           submitdata.data.champion_award_id = '';
           is_disabled.value = false;
           loading.value = false;
           errors.value = [];
        }
        let getClubs = (id = null) => {
            loading.value = true;

            adminApi.get(`dashboard/club-match-dropdown?champion_award_id=${submitdata.data.champion_award_id}&club_match_id=${id? id : ''}`)
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
                getChampion();
                if (props.type != 'edit') {

                } else {
                    id.value = props.dataRow.id;
                    submitdata.data.champion_award_id = props.dataRow.champion_award_id;
                    getClubs(props.dataRow.club_match_id);
                    adminApi.get(`dashboard/result/${id.value}`)
                    .then((res) => {
                        loading.value = true;
                        let l = res.data.data;

                        submitdata.data.club2_result = l.club2_result;
                        submitdata.data.club1_result = l.club1_result;
                        submitdata.data.club_match_id = l.club_match_id;

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
                club2_result: '',
                club1_result: '',
                club_match_id: '',
                champion_award_id: '',
            }
        });

        const rules = computed(() => {
            return {
                club2_result: {required},
                club1_result: {required},
                club_match_id: {required},
                champion_award_id: {required},
            }
        });

        const v$ = useVuelidate(rules,submitdata.data);

        return {t,id,
            loading,is_disabled,colors,
            resetModal,resetModalHidden
            ,...toRefs(submitdata),
            v$,errors,getClubs,champions};
    },
    methods: {
        AddSubmit() {

        this.v$.$validate();
        this.errors = {};

        let formData = new FormData();
        formData.append('club2_result', this.data.club2_result);
        formData.append('club1_result', this.data.club1_result);
        formData.append('club_match_id', this.data.club_match_id);

        if (this.type !== 'edit') {
            if (!this.v$.$error) {
                this.is_disabled = false;
                this.loading = true;
                adminApi.post(`dashboard/result`, formData)
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
            adminApi.post(`dashboard/result/${this.id}`,formData)
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
