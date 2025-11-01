<template>
    <!-- Start::app-content -->

    <div class="all-news-area sec-spacer py-0">
        <div class="container">
            <div class="row mb-5">

                <!-- Start::row-1 -->
                <div class="col-xxl-12 col-xl-12 col-lg-12">
                    <ul class="nav nav-tabs justify-content-center my-3 tab-style-3" id="myTab2" role="tablist">
                        <li class="nav-item me-0 px-0" role="presentation">
                            <button
                                :class="['nav-link home py-1', step == 1 ? 'active' : 'disabled', step >= 2 ? 'active-data' : '']"
                                id="home-tab" data-bs-toggle="tab" data-bs-target="#category-of-participation"
                                type="button" role="tab" aria-controls="category-of-participation" aria-selected="true">
                                Categories of participation
                                <i v-if="step >= 2" class="fa fa-check text-success d-block "
                                    style="font-size: 18px "></i>
                            </button>
                        </li>
                        <li class="nav-item me-0 px-0" role="presentation">
                            <button
                                :class="['nav-link about py-1', step == 2 ? 'active' : 'disabled', step >= 3 ? 'active-data' : '']"
                                id="Accommodation" data-bs-toggle="tab" data-bs-target="#Accommodation-pane"
                                type="button" role="tab" aria-controls="Accommodation-pane"
                                aria-selected="false">Accommodation
                                <i v-if="step >= 3" class="fa fa-check text-success d-block "
                                    style="font-size: 18px "></i>
                            </button>
                        </li>
                        <li class="nav-item me-0 px-0" role="presentation">
                            <button
                                :class="['nav-link services py-1', step == 3 ? 'active' : 'disabled', step >= 4 ? 'active-data' : '']"
                                id="team" data-bs-toggle="tab" data-bs-target="#team-pane" type="button" role="tab"
                                aria-controls="team-pane" aria-selected="false">Team
                                <i v-if="step >= 4" class="fa fa-check text-success d-block "
                                    style="font-size: 18px "></i>
                            </button>
                        </li>
                        <li class="nav-item me-0 px-0" role="presentation">
                            <button
                                :class="['nav-link images py-1', step == 4 ? 'active' : 'disabled', step >= 5 ? 'active-data' : '']"
                                id="club-tab" data-bs-toggle="tab" data-bs-target="#club-tab-pane" type="button"
                                role="tab" aria-controls="club-tab-pane" aria-selected="false">Club <i v-if="step >= 5"
                                    class="fa fa-check text-success d-block " style="font-size: 18px "></i>
                            </button>
                        </li>
                        <li class="nav-item me-0 px-0" role="presentation">
                            <button
                                :class="['nav-link terms py-1', step == 5 ? 'active' : 'disabled', step >= 6 ? 'active-data' : '']"
                                id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button"
                                role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact
                                <i v-if="step >= 6" class="fa fa-check text-success d-block "
                                    style="font-size: 18px "></i>

                            </button>
                        </li>
                        <li class="nav-item me-0 px-0 dd-step" role="presentation">
                            <button
                                :class="['nav-link terms py-1', step == 6 ? 'active' : 'disabled', step == 7 ? 'active-data' : '']"
                                id="complete-tab" data-bs-toggle="tab" data-bs-target="#complete-tab-pane" type="button"
                                role="tab" aria-controls="complete-tab-pane" aria-selected="false">Complete
                                <i v-if="step >= 7" class="fa fa-check text-success d-block "
                                    style="font-size: 18px "></i>

                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent1">
                        <template v-if="error_message">
                            <div class="text-danger alert alert-danger">
                                {{ error_message }}
                            </div>
                        </template>
                        
                        <div :class="['tab-pane fade text-muted position-relative', step == 1 ? 'show active' : '']"
                            id="category-of-participation" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Category</h5>
                                        <p style="font-size: 14px;">
                                            Here you choose the accommodation category that suits your team. You can
                                            read more about the categories in the <a href="/tournament-information"
                                                target="_blank">tournament information</a>.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="row gy-4 my-5">
                                        <h5 class="col-12">Accommodation categories</h5>
                                        <div class="col-12">
                                            <div class="invalid-feedback">
                                                <span v-if="v$.step1.category_id.$error">You must select one
                                                    option<br />
                                                </span>
                                                <span v-if="v$.step1.category_id.numeric.$invalid">Can't select this
                                                    option<br /></span>

                                            </div>
                                            <template v-if="errors[`category_id`]">
                                                <error-message v-for="(errorMessage, index) in errors[`category_id`]"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>
                                        </div>

                                        <div class="radio-container  my-2"
                                            :class="{ 'is-invalid': v$.step1.category_id.$error || errors[`category_id`] }"
                                            v-for="category in categoriesOfParticipation" :key="category.id"
                                            :style="[step1?.category_id == category.id ? 'border-color:#fbc02d' : '']">
                                            <input type="radio" :id="`radio1-${category.id}`"
                                                :disabled="category.is_disabled" name="category_id" :value="category.id"
                                                v-model="v$.step1.category_id.$model" class="radio-button">
                                            <label :for="`radio1-${category.id}`" class="radio-label">
                                                <div class="radio-title">{{ category.title }}</div>
                                                <div class="radio-description">{{ category.description }}</div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" @click.prevent="showStep1" v-if="!loading"
                                            class="btn btn-primary">
                                            Next
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else>
                                            <span class="me-2">{{ $t('global.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :class="['tab-pane fade text-muted position-relative', step == 2 ? 'show active' : '']"
                            id="Accommodation-pane" role="tabpanel" aria-labelledby="Accommodation" tabindex="1">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Accommodation</h5>
                                        <p style="font-size: 14px;">
                                            Choose the area where you prefer to stay.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="row gy-4 my-5">
                                        <div class="col-12 px-0" v-if="step1.category_id == 2">
                                            <h5 class="col-12">Hotel accommodation</h5>
                                            <p>We offer a variety of comfortable hotel accommodations for teams
                                                participating in the tournament,
                                                with options in different price ranges both in and around Gothenburg.
                                            </p>
                                            <p>Whether you choose a hotel in the city center or in nearby areas, you
                                                will always have easy
                                                access to your playing fields.</p>
                                            <p>Bookings will be done on a first come first serve basis, depending on
                                                date of paid registration
                                                fee.</p>
                                        </div>
                                        <div class="col-12 px-0" v-if="step1.category_id == 1">
                                            <h5 class="col-12">School accommodation</h5>
                                            <p>Which school your team will be accommodated at will be published on
                                                Gothia Account in the
                                                beginning of June.</p>
                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Preferred area</label>

                                            <Select v-model="step2.area_id" :filterFields="['id', 'title']"
                                                :options="areas" filter
                                                :invalid="v$.step2.area_id.$error || errors[`area_id`]"
                                                optionLabel="title" optionValue="id"
                                                :class="['w-full w-100', { 'is-invalid': v$.step2.area_id.$error || errors[`area_id`], 'is-valid': !v$.step2.area_id.$invalid && !errors[`area_id`] }]">

                                            </Select>

                                            <template v-if="errors['area_id']">
                                                <error-message v-for="(errorMessage, index) in errors['area_id']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <template v-if="step1.category_id == 2">
                                            <div class="col-12 my-2">

                                                <label class="form-label">Approximately number of persons</label>

                                                <input type="number" v-model="step2.number_of_persons"
                                                    :class="['form-control', { 'is-invalid': v$.step2.number_of_persons.$error || errors[`number_of_persons`], 'is-valid': !v$.step2.number_of_persons.$invalid && !errors[`number_of_persons`] }]"
                                                    placeholder="Number of persons">

                                                <template v-if="errors['number_of_persons']">
                                                    <error-message
                                                        v-for="(errorMessage, index) in errors['number_of_persons']"
                                                        :key="index">
                                                        {{ errorMessage }}
                                                    </error-message>
                                                </template>

                                            </div>

                                            <div class="col-12 my-2">

                                                <label class="form-label"> Preferred Room Type</label>

                                                <Select v-model="step2.preferred_room_type" :options="rooms"
                                                    :invalid="v$.step2.preferred_room_type.$error || errors[`preferred_room_type`]"
                                                    :class="['w-full w-100', { 'is-invalid': v$.step2.preferred_room_type.$error || errors[`preferred_room_type`], 'is-valid': !v$.step2.preferred_room_type.$invalid && !errors[`preferred_room_type`] }]">

                                                </Select>

                                                <template v-if="errors['preferred_room_type']">
                                                    <error-message
                                                        v-for="(errorMessage, index) in errors['preferred_room_type']"
                                                        :key="index">
                                                        {{ errorMessage }}
                                                    </error-message>
                                                </template>


                                            </div>
                                            <div class="col-12 my-2">

                                                <label class="form-label"> Preferred hotel</label>

                                                <input type="text" v-model="step2.preferred_hotel"
                                                    :class="['form-control', { 'is-invalid': v$.step2.preferred_hotel.$error || errors[`preferred_hotel`], 'is-valid': !v$.step2.preferred_hotel.$invalid && !errors[`preferred_hotel`] }]"
                                                    placeholder="Preferred Hotel">

                                                <template v-if="errors['preferred_hotel']">
                                                    <error-message
                                                        v-for="(errorMessage, index) in errors['preferred_hotel']"
                                                        :key="index">
                                                        {{ errorMessage }}
                                                    </error-message>
                                                </template>


                                            </div>
                                        </template>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" @click.prevent="step = 1"
                                            class="btn btn-dark mx-2">Previous
                                        </button>
                                        <button type="button" @click.prevent="showStep2" v-if="!loading"
                                            class="btn btn-primary">
                                            Next
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else>
                                            <span class="me-2">{{ $t('global.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :class="['tab-pane fade text-muted position-relative', step == 3 ? 'show active' : '']"
                            id="team-pane" role="tabpanel" aria-labelledby="team" tabindex="2">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Team</h5>
                                        <p style="font-size: 14px;">
                                            Choose the age category that the team will participate in and fill out the
                                            teams outfit colors.
                                        </p>

                                        <p> You'll find the age categories for 2025 in the <a
                                                href="/tournament-regulations" target="_blank">tournament
                                                regulations</a>.</p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="row gy-4 my-5">

                                        <div class="col-12 my-2">

                                            <label class="form-label">Age Category</label>

                                            <Select v-model="step3.age_category_id" :filterFields="['id', 'title']"
                                                :options="ageCategories" filter
                                                :invalid="v$.step3.age_category_id.$error || errors[`age_category_id`]"
                                                optionLabel="title" optionValue="id"
                                                :class="['w-full w-100', { 'is-invalid': v$.step3.age_category_id.$error || errors[`age_category_id`], 'is-valid': !v$.step3.age_category_id.$invalid && !errors[`age_category_id`] }]">

                                            </Select>

                                            <div class="invalid-feedback">
                                                <span v-if="v$.step3.age_category_id.$error">You must select one
                                                    option<br />
                                                </span>
                                                <span v-if="v$.step3.age_category_id.numeric.$invalid">Can't select this
                                                    option<br /></span>

                                            </div>

                                            <template v-if="errors['age_category_id']">
                                                <error-message
                                                    v-for="(errorMessage, index) in errors['age_category_id']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>

                                        <div class="row col-12 ">
                                            <div class="col-9 row ">
                                                <div class="col-12 my-1">

                                                    <label class="form-label">Shirt Type</label>

                                                    <Select v-model="step3.shirt_type" :options="shirtTypes"
                                                        :invalid="v$.step3.shirt_type.$error || errors[`shirt_type`]"
                                                        optionLabel="name" optionValue="id"
                                                        :class="['w-full w-100', { 'is-invalid': v$.step3.shirt_type.$error || errors[`shirt_type`], 'is-valid': !v$.step3.shirt_type.$invalid && !errors[`shirt_type`] }]">

                                                    </Select>

                                                    <div class="invalid-feedback">
                                                        <span v-if="v$.step3.shirt_type.$error">You must select one
                                                            option<br />
                                                        </span>

                                                    </div>

                                                    <template v-if="errors['shirt_type']">
                                                        <error-message
                                                            v-for="(errorMessage, index) in errors['shirt_type']"
                                                            :key="index">
                                                            {{ errorMessage }}
                                                        </error-message>
                                                    </template>


                                                </div>
                                                <div class="col-12 my-1">

                                                    <label class="form-label">Shirt Color</label>

                                                    <Select v-model="step3.shirt_color" :options="colors"
                                                        :invalid="v$.step3.shirt_color.$error || errors[`shirt_color`]"
                                                        :class="['w-full w-100', { 'is-invalid': v$.step3.shirt_color.$error || errors[`shirt_color`], 'is-valid': !v$.step3.shirt_color.$invalid && !errors[`shirt_color`] }]">

                                                    </Select>

                                                    <div class="invalid-feedback">
                                                        <span v-if="v$.step3.shirt_color.$error">You must select one
                                                            option<br />
                                                        </span>

                                                    </div>

                                                    <template v-if="errors['shirt_color']">
                                                        <error-message
                                                            v-for="(errorMessage, index) in errors['shirt_color']"
                                                            :key="index">
                                                            {{ errorMessage }}
                                                        </error-message>
                                                    </template>


                                                </div>
                                                <div class="col-12 my-1">

                                                    <label class="form-label">Secondary Color</label>

                                                    <Select v-model="step3.secondary_color" :options="colors"
                                                        :invalid="v$.step3.secondary_color.$error || errors[`secondary_color`]"
                                                        :class="['w-full w-100', { 'is-invalid': v$.step3.secondary_color.$error || errors[`secondary_color`], 'is-valid': !v$.step3.secondary_color.$invalid && !errors[`secondary_color`] }]">

                                                    </Select>

                                                    <div class="invalid-feedback">
                                                        <span v-if="v$.step3.secondary_color.$error">You must select one
                                                            option<br />
                                                        </span>

                                                    </div>

                                                    <template v-if="errors['secondary_color']">
                                                        <error-message
                                                            v-for="(errorMessage, index) in errors['secondary_color']"
                                                            :key="index">
                                                            {{ errorMessage }}
                                                        </error-message>
                                                    </template>


                                                </div>
                                                <div class="col-12 my-1">

                                                    <label class="form-label">Trousers</label>

                                                    <Select v-model="step3.trousers_color" :options="colors"
                                                        :invalid="v$.step3.trousers_color.$error || errors[`trousers_color`]"
                                                        :class="['w-full w-100', { 'is-invalid': v$.step3.trousers_color.$error || errors[`trousers_color`], 'is-valid': !v$.step3.trousers_color.$invalid && !errors[`trousers_color`] }]">

                                                    </Select>

                                                    <div class="invalid-feedback">
                                                        <span v-if="v$.step3.trousers_color.$error">You must select one
                                                            option<br />
                                                        </span>

                                                    </div>

                                                    <template v-if="errors['trousers_color']">
                                                        <error-message
                                                            v-for="(errorMessage, index) in errors['trousers_color']"
                                                            :key="index">
                                                            {{ errorMessage }}
                                                        </error-message>
                                                    </template>


                                                </div>

                                            </div>
                                            <div class="col-3">
                                                <div class="row justify-content-center align-items-center pt-5">
                                                    <div class="col-12 mt-5">
                                                        <img style="width:150px"
                                                            :src="`/images/outfitColors/${step3.shirt_type}_${step3.shirt_color}_${step3.secondary_color}_${step3.trousers_color}.png`"
                                                            alt="outfit-color">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <div class="text-center">
                                        <button type="button" @click.prevent="step = 2"
                                            class="btn btn-dark mx-2">Previous
                                        </button>
                                        <button type="button" @click.prevent="showStep3" v-if="!loading"
                                            class="btn btn-primary">
                                            Next
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else>
                                            <span class="me-2">{{ $t('global.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :class="['tab-pane fade text-muted', step == 4 ? 'show active' : '']" id="club-tab-pane"
                            role="tabpanel" aria-labelledby="team-tab" tabindex="3">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Club</h5>
                                        <p style="font-size: 14px;">
                                            Fill out the information about your club</p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="row gy-4 my-5">

                                        <div class="col-12 my-2">

                                            <label class="form-label">Club Name</label>

                                            <input type="text" v-model="step4.club_name"
                                                :class="['form-control', { 'is-invalid': v$.step4.club_name.$error || errors[`club_name`], 'is-valid': !v$.step4.club_name.$invalid && !errors[`club_name`] }]"
                                                placeholder="Club Name">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step4.club_name.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['club_name']">
                                                <error-message v-for="(errorMessage, index) in errors['club_name']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Club City</label>

                                            <input type="text" v-model="step4.club_city"
                                                :class="['form-control', { 'is-invalid': v$.step4.club_city.$error || errors[`club_city`], 'is-valid': !v$.step4.club_city.$invalid && !errors[`club_city`] }]"
                                                placeholder="Club City">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step4.club_city.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['club_city']">
                                                <error-message v-for="(errorMessage, index) in errors['club_city']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Club Postal Code</label>

                                            <input type="text" v-model="step4.club_postal_code"
                                                :class="['form-control', { 'is-invalid': v$.step4.club_postal_code.$error || errors[`club_postal_code`], 'is-valid': !v$.step4.club_postal_code.$invalid && !errors[`club_postal_code`] }]"
                                                placeholder="Club Postal Code">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step4.club_postal_code.required.$invalid && v$.step4.club_postal_code.$error">This Field is required<br />
                                                </span>
                                                <span v-if="v$.step4.club_postal_code.numeric.$invalid">This Field must be an integer<br /></span>

                                            </div>

                                            <template v-if="errors['club_postal_code']">
                                                <error-message
                                                    v-for="(errorMessage, index) in errors['club_postal_code']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Country</label>

                                            <Select v-model="step4.country_id" :filterFields="['id', 'title']"
                                                :options="countries" filter
                                                :invalid="v$.step4.country_id.$error || errors[`country_id`]"
                                                optionLabel="title" optionValue="id"
                                                :class="['w-full w-100', { 'is-invalid': v$.step4.country_id.$error || errors[`country_id`], 'is-valid': !v$.step4.country_id.$invalid && !errors[`country_id`] }]">

                                            </Select>

                                            <div class="invalid-feedback">
                                                <span v-if="v$.step4.country_id.$error">You must select one option<br />
                                                </span>
                                                <span v-if="v$.step4.country_id.numeric.$invalid">Can't select this
                                                    option<br /></span>

                                            </div>

                                            <template v-if="errors['country_id']">
                                                <error-message v-for="(errorMessage, index) in errors['country_id']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div>

                                    </div>

                                    <div class="text-center">
                                        <button type="button" @click.prevent="step = 3"
                                            class="btn btn-dark mx-2">Previous
                                        </button>
                                        <button type="button" @click.prevent="showStep4" v-if="!loading"
                                            class="btn btn-primary">
                                            Next
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else disabled style="cursor: not-allowed;">
                                            <span class="me-2">{{ $t('global.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :class="['tab-pane fade text-muted', step == 5 ? 'show active' : '']" id="contact-tab-pane"
                            role="tabpanel" aria-labelledby="contact-tab" tabindex="4">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Contact</h5>
                                        <p style="font-size: 14px;">
                                            Enter the person's contact information that preliminary handles the team's
                                            registration.</p>
                                        
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">

                                    <div class="row gy-4 my-5">

                                        <!-- <div class="col-12 my-2">

                                            <label class="form-label">Contact person</label>

                                            <input type="text" v-model="step5.contact_person"
                                                :class="['form-control', { 'is-invalid': v$.step5.contact_person.$error || errors[`contact_person`], 'is-valid': !v$.step5.contact_person.$invalid && !errors[`contact_person`] }]"
                                                placeholder="First And Last Name">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.contact_person.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['contact_person']">
                                                <error-message v-for="(errorMessage, index) in errors['contact_person']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div> -->
                                        <div class="col-12 my-2">

                                            <label class="form-label">Street And Number</label>

                                            <input type="text" v-model="step5.street_and_number"
                                                :class="['form-control', { 'is-invalid': v$.step5.street_and_number.$error || errors[`street_and_number`], 'is-valid': !v$.step5.street_and_number.$invalid && !errors[`street_and_number`] }]"
                                                placeholder="Street And Number">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.street_and_number.$error">This field is
                                                    required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['street_and_number']">
                                                <error-message
                                                    v-for="(errorMessage, index) in errors['street_and_number']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Postal Code</label>

                                            <input type="text" v-model="step5.postal_code"
                                                :class="['form-control', { 'is-invalid': v$.step5.postal_code.$error || errors[`postal_code`], 'is-valid': !v$.step5.postal_code.$invalid && !errors[`postal_code`] }]"
                                                placeholder="Postal Code">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.postal_code.required.$invalid && v$.step5.postal_code.$error">This field is required<br />
                                                </span>
                                                <span v-if="v$.step5.postal_code.numeric.$invalid">This Field must be an integer<br /></span>


                                            </div>

                                            <template v-if="errors['postal_code']">
                                                <error-message v-for="(errorMessage, index) in errors['postal_code']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">City</label>

                                            <input type="text" v-model="step5.city"
                                                :class="['form-control', { 'is-invalid': v$.step5.city.$error || errors[`city`], 'is-valid': !v$.step5.city.$invalid && !errors[`city`] }]"
                                                placeholder="City">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.city.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['city']">
                                                <error-message v-for="(errorMessage, index) in errors['city']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <!-- <div class="col-12 my-2">

                                            <label class="form-label">Mobile number, including country code</label>

                                            <input type="text" v-model="step5.phone"
                                                :class="['form-control', { 'is-invalid': v$.step5.phone.$error || errors[`phone`], 'is-valid': !v$.step5.phone.$invalid && !errors[`phone`] }]"
                                                placeholder="Phone">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.phone.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['phone']">
                                                <error-message v-for="(errorMessage, index) in errors['phone']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div>
                                        <div class="col-12 my-2">

                                            <label class="form-label">Email</label>

                                            <input type="email" v-model="step5.email"
                                                :class="['form-control', { 'is-invalid': v$.step5.email.$error || errors[`email`], 'is-valid': !v$.step5.email.$invalid && !errors[`email`] }]"
                                                placeholder="Email">


                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.email.$error">This field is required<br />
                                                </span>

                                            </div>

                                            <template v-if="errors['email']">
                                                <error-message v-for="(errorMessage, index) in errors['email']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>


                                        </div> -->
                                        <!-- <div class="col-12 my-2">

                                            <label class="form-label">Country</label>

                                            <Select v-model="step5.country_id" :filterFields="['id', 'title']"
                                                :options="countries" filter
                                                :invalid="v$.step5.country_id.$error || errors[`country_id`]"
                                                optionLabel="title" optionValue="id"
                                                :class="['w-full w-100', { 'is-invalid': v$.step5.country_id.$error || errors[`country_id`], 'is-valid': !v$.step5.country_id.$invalid && !errors[`country_id`] }]">

                                            </Select>

                                            <div class="invalid-feedback">
                                                <span v-if="v$.step5.country_id.$error">You must select one option<br />
                                                </span>
                                                <span v-if="v$.step5.country_id.numeric.$invalid">Can't select this
                                                    option<br /></span>

                                            </div>

                                            <template v-if="errors['country_id']">
                                                <error-message v-for="(errorMessage, index) in errors['country_id']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div> -->

                                    </div>


                                    <div class="text-center">
                                        <button type="button" @click.prevent="step = 4"
                                            class="btn btn-dark mx-2">Previous
                                        </button>
                                        <button type="button" @click.prevent="showStep5" v-if="!loading"
                                            class="btn btn-primary">
                                            Next
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else>
                                            <span class="me-2">{{ $t('global.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div :class="['tab-pane fade text-muted', step == 6 ? 'show active' : '']" id="complete-tab-pane"
                            role="tabpanel" aria-labelledby="complete-tab" tabindex="4">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="fs-12 mt-5">
                                        <h5>Complete</h5>
                                        <p style="font-size: 14px;">
                                            When you have completed the form, you will receive an email that confirms
                                            that we have received your
                                            registration. Please note that this is not a confirmation of participation.
                                            Please check that this
                                            email did not end up in your spam.</p>
                                            <p>If you have any questions about your registration you are welcome to contact
                                            us at info@gothiacup.se.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <div class="row gy-4 my-5">

<!-- 
                                        <div class="col-12 my-2">

                                            <label class="form-label">How did you learn about Us?</label>

                                            <Select v-model="step6.learn_about_id" :filterFields="['id', 'title']"
                                                :options="howYouKnowAboutUs" filter
                                                :invalid="v$.step6.learn_about_id.$error || errors[`learn_about_id`]"
                                                optionLabel="title" optionValue="id"
                                                :class="['w-full w-100', { 'is-invalid': v$.step6.learn_about_id.$error || errors[`learn_about_id`], 'is-valid': !v$.step6.learn_about_id.$invalid && !errors[`learn_about_id`] }]">

                                            </Select>

                                            <div class="invalid-feedback">
                                                <span v-if="v$.step6.learn_about_id.$error">You must select one
                                                    option<br />
                                                </span>
                                                <span v-if="v$.step6.learn_about_id.numeric.$invalid">Can't select this
                                                    option<br /></span>

                                            </div>

                                            <template v-if="errors['learn_about_id']">
                                                <error-message v-for="(errorMessage, index) in errors['learn_about_id']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div> -->

                                        <div class="col-12 mt-3">
                                            <div class="switch-container">
                                                <input type="checkbox" v-model="step6.tournament_information" id="switch" class="switch-checkbox">
                                                <label for="switch" class="switch-label"></label>
                                                <div class="mx-3 ">
                                                    <h6 class="my-0">I have read the tournament information</h6>
                                                    <p class="mb-1">I have read and accepts the <a href="/tournament-information" target="_blank">tournament information</a></p>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                <span v-if="v$.step6.tournament_information.$error">You must accept all the terms and conditions<br />
                                                </span>
                                            </div>
                                            
                                            <template v-if="errors['tournament_information']">
                                                <error-message v-for="(errorMessage, index) in errors['tournament_information']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="switch-container">
                                                <input type="checkbox" v-model="step6.tournament_regulations" id="switch2" class="switch-checkbox">
                                                <label for="switch2" class="switch-label"></label>
                                                <div class="mx-3 ">
                                                    <h6 class="my-0"> I have read the tournament regulations</h6>
                                                    <p class="mb-1">I have read and accepts the <a href="/tournament-regulations" target="_blank">tournament regulations</a></p>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                <span v-if="v$.step6.tournament_regulations.$error">You must accept all the terms and conditions<br />
                                                </span>
                                            </div>
                                            
                                            <template v-if="errors['tournament_regulations']">
                                                <error-message v-for="(errorMessage, index) in errors['tournament_regulations']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="switch-container">
                                                <input type="checkbox" v-model="step6.general_conditions" id="switch3" class="switch-checkbox">
                                                <label for="switch3" class="switch-label"></label>
                                                <div class="mx-3 ">
                                                    <h6 class="my-0"> I have read the general conditions</h6>
                                                    <p class="mb-1">I have read and accepts the <a href="/general-conditions" target="_blank">general conditions</a></p>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                <span v-if="v$.step6.general_conditions.$error">You must accept all the terms and conditions<br />
                                                </span>
                                            </div>
                                            
                                            <template v-if="errors['general_conditions']">
                                                <error-message v-for="(errorMessage, index) in errors['general_conditions']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="switch-container">
                                                <input type="checkbox" v-model="step6.child_safety_policy" id="switch4" class="switch-checkbox">
                                                <label for="switch4" class="switch-label"></label>
                                                <div class="mx-3 ">
                                                    <h6 class="my-0">I have read the child safety policy</h6>
                                                    <p class="mb-1">I have read and accept the <a href="/child-safety-policy" target="_blank">child safety policy.</a></p>
                                                </div>
                                            </div>
                                            <div class="invalid-feedback">
                                                <span v-if="v$.step6.child_safety_policy.$error">You must accept all the terms and conditions<br />
                                                </span>
                                            </div>
                                            
                                            <template v-if="errors['child_safety_policy']">
                                                <error-message v-for="(errorMessage, index) in errors['child_safety_policy']"
                                                    :key="index">
                                                    {{ errorMessage }}
                                                </error-message>
                                            </template>

                                        </div>

                                    </div>


                                    <div class="text-center">
                                        <button type="button" @click.prevent="step = 5"
                                            class="btn btn-dark mx-2">Previous
                                        </button>
                                        <button type="button" @click.prevent="AddSubmit" v-if="!loading"
                                            class="btn btn-primary">
                                            Submit
                                        </button>
                                        <button class="btn btn-primary btn-loader" v-else>
                                            <span class="me-2">{{ $t('auth.Loading') }}</span>
                                            <span class="loading"><i class="ri-loader-2-fill fs-16"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->
            </div>
        </div>
    </div>

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
    requiredIf,
    sameAs,
    numeric,
    minValue
} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../api/webAxios";
import { formatTime } from "../../helper/formatTime";
// import DatePicker from 'primevue/datepicker';
import { useI18n } from "vue-i18n";


export default {
    name: "register",
    // components: {
    //     DatePicker
    // },
    setup() {

        const errors = ref([]);
        const howYouKnowAboutUs = ref([]);
        const categoriesOfParticipation = ref([]);
        const ageCategories = ref([]);
        const countries = ref([]);
        const types = ref({});
        let loading = ref(false);
        const languages = ref([]);
        const clientLanguage = ref([]);
        const { t } = useI18n({});
        const areas = ref([]);
        let is_valid = ref(true);
        let step = ref(1);
        let error_message = ref('');


        let getCategoriesOfParticipation = () => {
            webApi.get(`/web/categories-of-participation`)
                .then((res) => {
                    categoriesOfParticipation.value = res.data.data;
                })
                .catch((err) => {
                })
        }
        let getAreas = () => {
            webApi.get(`/web/areas`)
                .then((res) => {
                    areas.value = res.data.data;
                })
                .catch((err) => {
                })
        }
        let getAgeCategories = () => {
            webApi.get(`/web/age-categories`)
                .then((res) => {
                    ageCategories.value = res.data.data;
                })
                .catch((err) => {
                })
        }
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
            step1: {
                category_id: "",

            },
            step2: {
                area_id: "",
                preferred_hotel: "",
                number_of_persons: "",
                preferred_room_type: "",
            },
            step3: {
                age_category_id: '',
                shirt_type: 'f',
                shirt_color: 'red',
                secondary_color: 'red',
                trousers_color: 'red',
            },
            step4: {
                counrty_id: '',
                club_name: '',
                club_city: '',
                club_postal_code: '',
            },
            step5: {
                // contact_person: '',
                street_and_number: '',
                postal_code: '',
                // phone: '',
                // email: '',
                // country_id: '',
                city: '',
            },
            step6: {
                // learn_about_id: '',
                tournament_information: false,
                tournament_regulations: false,
                general_conditions: false,
                child_safety_policy: false,
            },
            data: {
                condition: false,
            }
        });

        const mustBeCoolPhone = (value) => value.match(/[0-9 ]{12}/);

        const rules = computed(() => {
            return {
                step1: {
                    category_id: {
                        required, numeric
                    },
                },
                step2: {
                    area_id: {
                        numeric
                    },
                    number_of_persons: {
                        numeric
                    },
                    preferred_room_type: {
                    },
                    preferred_hotel: {
                    },
                },
                step3: {
                    age_category_id: {
                        required, numeric
                    },
                    shirt_type: {
                        required
                    },
                    shirt_color: {
                        required
                    },
                    secondary_color: {
                        required
                    },
                    trousers_color: {
                        required
                    },
                },
                step4: {
                    country_id: {
                        required, numeric
                    },
                    club_name: {
                        required
                    },
                    club_city: {
                        required
                    },
                    club_postal_code: {
                        required,numeric
                    },

                },
                step5: {
                    // country_id: {
                    //     required, numeric
                    // },
                    // contact_person: {
                    //     required
                    // },
                    street_and_number: {
                        required
                    },
                    postal_code: {
                        required,numeric
                    },
                    // phone: {
                    //     required
                    // },
                    // email: {          
                    //     required
                    // },
                    city: {
                        required
                    },

                },
                step6: {
                    // learn_about_id: {
                    //     required, numeric
                    // },
                    tournament_information: {
                        required(){
                             return submitdata.step6.tournament_information == true
                        }
                    },
                    tournament_regulations: {
                        required(){
                             return submitdata.step6.tournament_regulations == true
                        }
                    },
                    general_conditions: {
                        required(){
                             return submitdata.step6.general_conditions == true
                        }
                    },
                    child_safety_policy: {
                        required(){
                             return submitdata.step6.child_safety_policy == true
                        }
                    },
                },  

            }
        });

        const v$ = useVuelidate(rules, submitdata);

        onMounted(() => {
            getCategoriesOfParticipation();
            getAreas();
            getAgeCategories();
            getCountries();
            getHowYouKnowAboutUs();
        });

        setTimeout(() => {
            is_valid.value = true;
        }, 200);

        const shirtTypes = ref([
            {
                "id": 'f',
                "name": 'Single Colored',
            },
            {
                "id": 'v',
                "name": 'Striped Vertical',
            },
            {
                'id': 'h',
                'name': 'Striped Horizontal',
            },
        ]);

        const colors = ref(['red', 'maroon', 'green', 'white', 'blue', 'lightBlue', 'yellow', 'black', 'grey', 'brown', 'purple', 'orange', 'pink', 'gold']);
        const rooms = ref(['Single Room', 'Double Roome', 'Triple Room', 'Quad Room']);


        const phoneValidation = (e) => {
            is_valid.value = e.valid;
            submitdata.personal.code_country = e.countryCallingCode;
        }

        const showStep0 = () => {
            v$.value.language.$validate();
            if (!v$.value.language.$error) {
                step.value = 1;
            }
        }

        const showStep1 = () => {
            v$.value.step1.$validate();
            if (!v$.value.step1.$error) {
                step.value = 2;
            }
        }

        const showStep2 = () => {
            v$.value.step2.$validate();
            if (!v$.value.step2.$error) {
                step.value = 3;
            }
        }

        const showStep3 = () => {
            v$.value.step3.$validate();
            if (!v$.value.step3.$error) {
                step.value = 4;
            }
        }

        const showStep4 = () => {
            v$.value.step4.$validate();
            if (!v$.value.step4.$error)
                step.value = 5;
        }
        const showStep5 = () => {
            v$.value.step5.$validate();
            if (!v$.value.step5.$error)
                step.value = 6;
        }
        const showStep6 = () => {
            v$.value.step6.$validate();
            if (!v$.value.step6.$error)
                step.value = 7;
        }


        return {
            v$, ...toRefs(submitdata), loading, clientLanguage, categoriesOfParticipation, ageCategories,
            errors, languages, is_valid, showStep2, showStep3, showStep0, shirtTypes, colors, showStep5, countries, howYouKnowAboutUs,showStep6,
            rooms, t, areas, phoneValidation, types, showStep1, step, showStep4,error_message
        }
    },
    methods: {
        AddSubmit() {
            this.error_message=''
            this.v$.$validate();
            this.errors = {};

            if (!this.v$.$error && this.is_valid) {

                let formData = new FormData();
         

                formData.append('category_id', this.step1.category_id);
                formData.append('area_id', this.step2.area_id);
                formData.append('preferred_hotel', this.step2.preferred_hotel);
                formData.append('number_of_persons', this.step2.number_of_persons);
                formData.append('preferred_room_type', this.step2.preferred_room_type);
                formData.append('age_category_id', this.step3.age_category_id);
                formData.append('shirt_type', this.step3.shirt_type);
                formData.append('shirt_color', this.step3.shirt_color);
                formData.append('secondary_color', this.step3.secondary_color);
                formData.append('trousers_color', this.step3.trousers_color);
                formData.append('club_country_id', this.step4.country_id);
                formData.append('club_name', this.step4.club_name);
                formData.append('club_city', this.step4.club_city);
                formData.append('club_postal_code', this.step4.club_postal_code);
                // formData.append('contact_person', this.step5.contact_person);
                formData.append('street_and_number', this.step5.street_and_number);
                formData.append('postal_code', this.step5.postal_code);
                // formData.append('phone', this.step5.phone);
                // formData.append('email', this.step5.email);
                // formData.append('country_id', this.step5.country_id);
                formData.append('city', this.step5.city);
                // formData.append('learn_about_id', this.step6.learn_about_id);
                formData.append('tournament_information', this.step6.tournament_information == true ? 1:0);
                formData.append('tournament_regulations', this.step6.tournament_regulations  == true ? 1:0);
                formData.append('general_conditions', this.step6.general_conditions  == true ? 1:0);
                formData.append('child_safety_policy', this.step6.child_safety_policy  == true ? 1:0);

                this.loading = true;
                webApi.post(`/web/complete-register`, formData)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            // title: `${this.t('global.TheDataHasBeenSentSuccessfullyAndYouWillBeRespondedToByCustomerServiceSoon')}`,
                            title: `The Data Has Been Sent Successfully`,
                            showConfirmButton: false,
                            timer: 6000
                        });

                        setTimeout(() => window.location='/', 3000);
                    })
                    .catch((err) => {
                        this.loading = false;
                        if (err) {
                            if (err.response) {
                                if (err.response.data) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: err.response.data.message,
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    if(err.response.data?.message)
                                        this.error_message = err.response.data.message;
                                    if(err.response.data?.errors)
                                        this.errors = err.response.data.errors;

                                    this.loading = false;

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
    color: #111111 !important;
}

.btn-primary {
    background-color: #111111 !important;
    border-color: #111111 !important;
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
    background-color: #111111;
}

.text-primary {
    color: #111111 !important;
}

.btn-primary {
    background-color: #111111 !important;
    border-color: #111111 !important;
}


.nav {
    margin-bottom: 60px;
}

.nav-item {
    padding: 0 30px;
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
    max-height: 785px;
    border-radius: unset;
}

.p-select {
    border: 1px solid #e9edf6;
}

.nav-tabs .nav-link.disabled,
.nav-tabs .nav-link:disabled {
    color: rgb(243, 240, 240);
}

.nav-tabs .nav-link.disabled,
.nav-tabs .nav-link:disabled {
    opacity: 1;
}

.active-data {
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

/* Overall style for the navigation container */
.nav-tabs {
    background-color: #111111;
    /* #111111 background for the container */
    border-radius: 15px;
    /* Rounded container for the wizard steps */
    padding: 40px 0;
}

/* Style for each individual tab (li) */
.nav-item {
    display: inline-block;
    margin: 0 10px;
}

/* Style for buttons inside the tabs */
.nav-link {
    color: #111111;
    /* #111111 text for tabs */
    background-color: #fbc02d;
    /* #fbc02d background for tabs */
    border-radius: 50%;
    /* Circle shape */
    width: 140px;
    /* Width of circle */
    height: 140px;
    /* Height of circle */
    text-align: center;
    /* Center text inside circle */
    line-height: 33px;
    /* Align text vertically inside circle */
    font-weight: bold;
    /* Bold text for clarity */
    border: 2px solid #111111;
    /* #111111 border around circles */
    transition: all 0.3s ease;
    /* Smooth transition for effects */
    font-size: 13px;
}

/* Active step styles */
.nav-link.active {
    color: #fbc02d;
    /* #fbc02d text on active step */
    border-color: #fbc02d;
    /* #fbc02d text on active step */
    background-color: #111111;
    /* #111111 background for active step */
}

/* Completed step (active-data) */
.nav-link.active-data {
    /* color: #12b91d!important;  #111111 text for completed steps */
    border: 2px solid #12b91d !important;
    /* Ensure border is visible */
}

/* Disabled (unvisited) step styles */
.nav-link.disabled {
    color: gray;
    /* Gray text for disabled tabs */
    background-color: transparent;
    /* Transparent background for disabled */
    cursor: not-allowed;
    /* Indicate that it's not clickable */
    border: 2px solid gray;
    /* Gray border for disabled tabs */
}

/* Hover effect */
.nav-link:hover {
    background-color: #111111;
    /* #111111 background on hover */
    color: #fbc02d;
    /* #fbc02d text on hover */
    border-color: #fbc02d;
    /* #fbc02d border on hover */
}

/* Optional: Style for the labels next to each tab (step names) */
.nav-link span {
    display: block;
    font-size: 0.75rem;
    color: #111111;
    /* #111111 text for the labels */
    margin-top: 5px;
    text-transform: uppercase;
}

/* Additional styles to manage steps that have labels */
.nav-item .nav-link span {
    display: none;
    /* Hide the labels by default */
}

.nav-item .nav-link.active span {
    display: block;
    /* Show the labels on active steps */
}

.radio-container {
    width: 100%;
    display: flex;
    align-items: center;
    border: 2px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    transition: border-color 0.3s;
    background-color: #f9f9f9;
}

/* Change border color when radio is selected */
.radio-container input[type="radio"]:checked+label {
    background-color: #f9f9f9;
    border-color: #fbc02d;
}

.radio-container:hover {
    border-color: #fbc02d;
    /* Border color on hover */
}

/* Title styling */
.radio-title {
    font-size: 15px;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

/* Description styling */
.radio-description {
    font-size: 13px;
    color: #777;
}

/* Styling for the radio button */
.radio-button {
    margin-right: 15px;
    cursor: pointer;
    transform: scale(1.2);
    /* Hide the default radio button */
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    border-radius: 50%;
    border: 2px solid #ccc;
    width: 20px;
    height: 20px;
    position: relative;
    transition: border-color 0.3s;
}

/* Style the radio button when selected */
.radio-button:checked {
    border-color: #fbc02d;
}

.radio-button:checked::before {
    content: '';
    position: absolute;
    top: 3px;
    left: 3px;
    width: 10px;
    height: 10px;
    background-color: #fbc02d;
    border-radius: 50%;
}

/* Active styling */
.radio-container input[type="radio"]:checked+label {
    background-color: #f9f9f9;
    color: #333;
    border-color: #fbc02d;
}

/* Label styling for the radio button */
.radio-label {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Label background and hover effects */
.radio-label:hover {
    padding: 5px;
    ;
    cursor: pointer;
    background-color: #f8d16e;
}

.is-invalid {
    border-color: #f44336 !important;
}

.invalid-feedback {
    display: block;
    color: #f44336 !important;
    font-size: 14px;
}

.radio-container input[type="radio"]:disabled+label {
    background-color: #f0f0f0 !important;
    border-color: #d3d3d3;
    cursor: not-allowed;
}



/* Container for the switch */
.switch-container {
    display: flex;
}

/* Hide the default checkbox */
.switch-checkbox {
    display: none;
}

/* Styling the switch label */
.switch-label {
    position: relative;
    width: 60px;
    height: 30px;
    background-color: #ccc;
    border-radius: 50px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Create the slider knob */
.switch-label::before {
    content: '';
    position: absolute;
    top: 3px;
    left: 3px;
    width: 24px;
    height: 24px;
    background-color: white;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

/* When the switch is checked (on), change styles */
.switch-checkbox:checked + .switch-label {
    background-color: #fbc02d;
}

/* Move the knob when checked */
.switch-checkbox:checked + .switch-label::before {
    transform: translateX(30px);
}

/* Optional: Add a smooth hover effect */
.switch-label:hover {
    background-color: #fbc02d;
}

</style>
