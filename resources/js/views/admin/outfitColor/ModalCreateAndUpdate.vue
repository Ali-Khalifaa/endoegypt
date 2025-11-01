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
                        <div class="col-md-6">
                            <label class="form-label">{{ $t('global.shirt_type') }}</label>

                            <Select v-model="data.shirt_type" :filterFields="['name','label']" :options="types" filter
                                    :invalid="v$.shirt_type.$error || errors[`shirt_type`]"
                                    optionLabel="label" optionValue="value"
                                    :class="['w-full w-100', { 'is-invalid': v$.shirt_type.$error || errors[`shirt_type`], 'is-valid': !v$.shirt_type.$invalid && !errors[`shirt_type`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.shirt_type.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['shirt_type']">
                                <error-message v-for="(errorMessage, index) in errors['shirt_type']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">{{ $t('global.shirt_color') }}</label>

                            <Select v-model="data.shirt_color_id" :filterFields="['id','title']" :options="colors" filter
                                    :invalid="v$.shirt_color_id.$error || errors[`shirt_color_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.shirt_color_id.$error || errors[`shirt_color_id`], 'is-valid': !v$.shirt_color_id.$invalid && !errors[`shirt_color_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.shirt_color_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['shirt_color_id']">
                                <error-message v-for="(errorMessage, index) in errors['shirt_color_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">{{ $t('global.secondary_color') }}</label>

                            <Select v-model="data.secondary_color_id" :filterFields="['id','title']" :options="colors" filter
                                    :invalid="v$.secondary_color_id.$error || errors[`secondary_color_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.secondary_color_id.$error || errors[`secondary_color_id`], 'is-valid': !v$.secondary_color_id.$invalid && !errors[`secondary_color_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.secondary_color_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['secondary_color_id']">
                                <error-message v-for="(errorMessage, index) in errors['secondary_color_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 ">
                            <label class="form-label">{{ $t('global.trousers_color') }}</label>

                            <Select v-model="data.trousers_color_id" :filterFields="['id','title']" :options="colors" filter
                                    :invalid="v$.trousers_color_id.$error || errors[`trousers_color_id`]"
                                     optionLabel="title" optionValue="id"
                                    :class="['w-full w-100', { 'is-invalid': v$.trousers_color_id.$error || errors[`trousers_color_id`], 'is-valid': !v$.trousers_color_id.$invalid && !errors[`trousers_color_id`] }]">

                            </Select>
                            <div class="invalid-feedback">
                                <span v-if="v$.trousers_color_id.required.$invalid">{{
                                        $t('global.ThisFieldIsRequired') }}<br />
                                </span>
                            </div>
                            <template v-if="errors['trousers_color_id']">
                                <error-message v-for="(errorMessage, index) in errors['trousers_color_id']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-6 mt-4">
                            <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                <input id="toggleswitchPrimary" v-model="data.status" type="checkbox">
                                <label for="toggleswitchPrimary" class="label-primary"></label><span class="ms-3">{{ $t('label.status') }}</span>
                            </div>
                            <template v-if="errors['status']">
                                <error-message v-for="(errorMessage, index) in errors['status']" :key="index">
                                    {{ errorMessage }}
                                </error-message>
                            </template>
                        </div>

                        <div class="col-md-12 mt-3 row flex-fill">
                            <div class="btn btn-outline-light waves-effect"  style="width: 90%; height:90%">

                                <span v-if="type != 'edit' && !numberOfImage"  style="margin-top:30%;">
                                    {{$t('global.ChooseImages')}}
                                    <br><i class="bi bi-cloud-upload fs-40" ></i>
                                    <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                </span>

                                <div id="container-images" v-show="image &&numberOfImage"></div>

                                <div  v-if="type == 'edit'" v-show="!numberOfImage">
                                    <figure>
                                        <figcaption>
                                            <img class="img-fluid rounded" :src="`${imageUpload}`">
                                        </figcaption>
                                    </figure>
                                </div>
                                <input name="mediaPackage" type="file" @change="preview" id="mediaPackage" accept="image/*">

                                <template v-if="errors['file']">
                                    <error-message v-for="(errorMessage, index) in errors['file']" :key="index">
                                        {{ errorMessage }}
                                    </error-message>
                                </template>
                                    <template class="text-danger text-center" v-if="requiredn">
                                        <error-message>{{$t('global.ImagesIsMustHaveAtLeast1Photos')}}<br /></error-message>
                                    </template>
                            </div>
                            <p class="num-of-files">{{numberOfImage ? numberOfImage + $t('global.FilesSelected') : $t('global.NoFilesChosen') }}</p>

                            <template v-if="errors[`image`]">
                                <error-message v-for="(errorMessage, index) in errors[`image`]" :key="index">
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
    name: "Category",
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
        const types = ref([]);
        const colors = ref([]);

        onMounted(()=>{

        });

       function defaultData(){
           submitdata.data.status = true;
           submitdata.data.shirt_type = '';
           submitdata.data.shirt_color_id = '';
           submitdata.data.secondary_color_id = '';
           submitdata.data.trousers_color_id = '';
           imageUpload.value = '';
           is_disabled.value = false;
           loading.value = false;
           image.value=null
           errors.value = [];
           empty();
        }
        let getTypesAndModel = () => {
            loading.value = true;

            adminApi.get(`dashboard/outfit-color-enums`)
                .then((res) => {
                    let l = res.data.data;
                    types.value = l.types;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        }
        let getColors = () => {
            loading.value = true;

            adminApi.get(`dashboard/color/dropdown`)
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
       function resetModal() {
            defaultData();
            setTimeout(async () => {
                getTypesAndModel();
                getColors();
                if (props.type != 'edit') {
                } else {
                    id.value = props.dataRow.id;
                    submitdata.data.status = props.dataRow.status==1;
                    submitdata.data.shirt_type = props.dataRow.shirt_type.value;
                    submitdata.data.shirt_color_id = props.dataRow.shirt_color?.id;
                    submitdata.data.secondary_color_id = props.dataRow.secondary_color?.id;
                    submitdata.data.trousers_color_id = props.dataRow.trousers_color?.id;
                    imageUpload.value = props.dataRow.image;
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
                status: true,
                shirt_type: '',
                shirt_color_id: '',
                secondary_color_id: '',
                trousers_color_id: '',
            }
        });

        const numberOfImage = ref(0);
        const image = ref({});
        const imageUpload = ref({});

        let empty = () => {
            numberOfImage.value = 0;
            let clearInput = document.querySelector('#mediaPackage').value = '';
            requiredn.value = false;
        }

        let preview = (e) => {

            let containerImages = document.querySelector('#container-images');
            containerImages.innerHTML = '';
            image.value = {};

            numberOfImage.value = e.target.files.length;

            image.value = e.target.files[0];

            let reader = new FileReader();
            let figure = document.createElement('figure');
            let figcap = document.createElement('figcaption');

            figcap.innerText = image.value.name;
            figure.appendChild(figcap);

            reader.onload = () => {
                let img = document.createElement('img');
                img.setAttribute('src',reader.result);
                img.classList.add('img-fluid', 'rounded');
                figure.insertBefore(img,figcap);
            }

            containerImages.appendChild(figure);
            reader.readAsDataURL(image.value);


        }

        // validation image
        const requiredn = ref(false);

        watch(numberOfImage, (count, prevCount) => {
            if(!count){
                requiredn.value = true;
            }else {
                requiredn.value = false;
            }
        });

        const rules = computed(() => {
            return {
                shirt_type: {required},
                shirt_color_id: {required},
                secondary_color_id: {required},
                trousers_color_id: {required},
            }
        });

        const v$ = useVuelidate(rules,submitdata.data);

        return {t,id,
            loading,is_disabled,types,colors,
            resetModal,empty,preview,resetModalHidden,
            imageUpload,image,...toRefs(submitdata),
            v$,numberOfImage,requiredn,errors};
    },
    methods: {
        AddSubmit() {

        this.v$.$validate();
        this.errors = {};

        let formData = new FormData();
        formData.append('shirt_type', this.data.shirt_type);
        formData.append('shirt_color_id', this.data.shirt_color_id);
        formData.append('secondary_color_id', this.data.secondary_color_id);
        formData.append('trousers_color_id', this.data.trousers_color_id);
        formData.append('status', this.data.status ? 1 : 0);
        if (this.image) {
            formData.append('image', this.image);
        }
        if (this.type !== 'edit') {
            if (!this.v$.$error && this.numberOfImage) {
                this.is_disabled = false;
                this.loading = true;
                adminApi.post(`dashboard/outfit-color`, formData)
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
            } else {
                if(!this.numberOfImage){
                        this.loading = false;
                        this.is_disabled = false;
                        this.requiredn = true;
                }
            }
        }else if(!this.v$.$error) {
            this.is_disabled = false;
            this.loading = true;
            formData.append('_method','PUT');
            adminApi.post(`dashboard/outfit-color/${this.id}`,formData)
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
