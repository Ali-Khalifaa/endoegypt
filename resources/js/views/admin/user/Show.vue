<template>
    <div class="modal fade" id="show" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xll modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="adminModalLabel">
                        {{ $t('global.show') }}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card custom-card overflow-hidden border border-primary">
                                <div class="card-body p-0">
                                    <div class="d-sm-flex align-items-top p-4 border-bottom-0 main-profile-cover">
                                        <div>
                                            <span class="avatar avatar-xxl avatar-rounded online me-3">
                                                <img src="/assets/images/faces/9.jpg" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-fill main-profile-info">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="fw-semibold mb-1 text-fixed-white">{{user.name}}</h6>
                                            </div>
                                            <h4 class="fs-12 text-fixed-white mb-4 op-5">

                                                <span class="badge fs-12 rounded-pill bg-success"
                                                      v-if="user.is_approved == 1">{{ $t('global.activated') }}</span>
                                                <span class="badge fs-12 rounded-pill bg-danger" v-else>{{
                                                        $t('global.Inactive') }}</span>
                                            </h4>
                                            <p class="mb-1 text-muted text-fixed-white op-7">{{user.manager_name}}</p>
                                            <p class="fs-12 text-fixed-white op-5">
                                                <span class="me-3"><i class="ri-building-line me-1 align-middle"></i>{{user.city}}</span>
                                                <span><i class="ri-map-pin-line me-1 align-middle"></i>{{user.street_and_number}}</span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- <div class="p-4 border-bottom border-block-end-dashed">
                                        <div class="mb-4">
                                            <p class="fs-15 mb-2 fw-semibold">{{ $t('global.restaurant_description') }} :</p>
                                            <p class="fs-12 text-muted op-7 mb-0">
                                                <b class="text-default">{{user?.restaurant_description}}</b>
                                            </p>
                                        </div>
                                        <div class="mb-0">
                                            <p class="fs-15 mb-2 fw-semibold">{{ $t('global.Links') }} :</p>
                                            <div class="mb-0">
                                                <p class="mb-1">
                                                    <a :href="user.terms" target="_blank" class="text-primary"><u>{{user.terms}}</u></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="p-4 border-bottom border-block-end-dashed">
                                        <p class="fs-15 mb-2 me-4 fw-semibold">{{ $t('global.ContactInformation') }} :</p>
                                        <div class="text-muted">
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="bi bi-phone"></i>
                                                </span>
                                                <span dir="ltr">{{user?.phone}}</span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="ri-mail-line"></i>
                                                </span>
                                                {{ user?.email }}
                                            </p>
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="ri-map-pin-line"></i>
                                                </span>
                                                {{ user?.postal_code }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="p-4 border-bottom border-block-end-dashed">
                                        <p class="fs-15 mb-2 me-4 fw-semibold">{{ $t('global.clubInformation') }} :</p>
                                        <div class="text-muted">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.name') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.club?.name}}</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.category') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.category}}</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.age_category') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.age_category}}</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.number_of_persons') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.number_of_persons}}</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.country') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.country}}</span>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.area') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.area}}</span>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.city') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.club?.city}}</span>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">
                                                    <div class="d-flex flex-wrap align-items-center">
                                                        <div class="me-2 fw-semibold">
                                                            {{ $t('global.postal_code') }} :
                                                        </div>
                                                        <span class="fs-12 text-muted">{{user?.club?.postal_code}}</span>
                                                    </div>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>

                                    <div class="p-4 border-bottom border-block-end-dashed">
                                        <p class="fs-15 mb-2 me-4 fw-semibold">{{ $t('global.hotelInformation') }} :</p>
                                        <div class="text-muted">
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="bi bi-house-door"></i>
                                                </span>
                                                {{  user?.preferred_room_type ?? '---' }}
                                            </p>
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="bi bi-building"></i>
                                                </span>
                                                {{  user?.preferred_hotel ?? '---' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-body p-0">
                                            <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                                                <div>
                                                    <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="gallery-tab" data-bs-toggle="tab"
                                                                    data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                                                    aria-controls="gallery-tab-pane" aria-selected="false">
                                                                <i class="ri-exchange-box-line me-1 align-middle d-inline-block"></i>
                                                                {{$t('global.attachments')}}
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-3" style="background-color: #f1f1f1;">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane show active fade p-0 border-0" id="gallery-tab-pane"
                                                         role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                                        <h3 class="my-5"  v-if="user?.restaurant_files?.media">
                                                            {{ $t('global.documents') }}
                                                        </h3>
                                                        <div class="row" v-if="user?.outfit_image">
                                                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 task-card">
                                                                <div class="card custom-card task-pending-card">
                                                                    <img :src="user.outfit_image" class="card-img-top" style="height: 200px;" alt="...">
                                                                    <div class="card-footer">
                                                                        <a href="#" :download="user.outfit_image" class="btn btn-primary d-flex align-items-center justify-content-center">
                                                                            <i class="ri-download-line fs-16 align-middle me-1"></i>{{ $t('global.downloadFile') }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="table-responsive">
                                                                    <table class="table nowrap text-nowrap border mt-4">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>{{$t('global.shirt_type')}}</th>
                                                                                <th>{{$t('global.shirt_color')}}</th>
                                                                                <th>{{$t('global.secondary_color')}}</th>
                                                                                <th>{{$t('global.trousers_color')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr >
                                                                                <td>
                                                                                    {{ $t('shirt_type.'+user.shirt_type) }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ user.shirt_color }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ user.secondary_color }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ user.trousers_color }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { $t } from "@primevue/themes";
import { ref } from "vue";
import { useI18n } from "vue-i18n";
import adminApi from "../../../api/adminAxios";

export default {
    name: "Show",
    props: {
        dataRow: { default: '' },
        type: { default: 'order' },
    },
    data() {
        return {
            errors: {}
        }
    },
    setup(props) {
        setTimeout(async () => {
            let myModalEl = document.getElementById('show')
            myModalEl.addEventListener('show.bs.modal', function (event) {
                resetModal();
            })
            myModalEl.addEventListener('hidden.bs.modal', function (event) {

            })
        }, 150);
        let loading = ref(false);
        const { t } = useI18n({});
        const id = ref(null);
        const user = ref('');

        function defaultData() {
            user.value = '';
            id.value = null;
        }

        function resetModal() {
            defaultData();
            setTimeout(async () => {
                id.value = props.dataRow.id;
                adminApi.get(`dashboard/user/${props.dataRow.id}`)
                .then((res) => {
                    user.value = res.data.data;
                })
                .catch((err) => {
                    console.log(err);
                })
            }, 50);
        }

        const days = ref(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday']);

        return {t, id,days, loading,user};
    }
}
</script>

<style scoped>
.work {
    padding: 10px 10px;
    background: #d5d5d5;
    border-radius: 13px;
    margin: 0 1px;
}
</style>
