<template>
    <div class="col-xxl-12 col-xl-12 col-lg-12 my-5" >
        <div class="row justify-content-center align-items-center h-100" >
            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12" style="border:solid 1px #dbdbdb;border-radius: 10px;">
                <div class="p-5">
                    <div class="bg-danger-transparent p-2 text-danger" v-show="errors">{{ errors?.message || '' }}</div>
                   
                    <form @submit.prevent="userLogin(loginData.data)">
                    <p class="h5 fw-semibold mb-2">{{$t('auth.signIn')}}</p>
                    <p class="mb-3 text-muted op-7 fw-normal">{{$t('auth.WelcomeBack')}}</p>
                    <div class="row gy-3">
                        <div class="col-xl-12 mt-0">
                            <label for="signin-email" class="form-label text-default">{{$t('label.emailOrPhone')}}</label>
                            <input type="text" class="form-control form-control-lg" v-model="loginData.data.email" id="signin-email" :placeholder="$t('label.emailOrPhone')">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="signin-password" class="form-label text-default d-block">{{$t('label.password')}}</label>
                            <div class="input-group">
                                <input type="password" class="form-control form-control-lg" v-model="loginData.data.password" id="signin-password" :placeholder="$t('label.password')">
                                <button class="btn btn-light" type="button" @click="showPassword()" id="button-addon2">
                                    <i :class="eye"></i></button>
                            </div>
                        </div>
                        <div class="col-xl-12 d-grid mt-2 text-center">
                            <button class="btn btn-lg btn-primary" type="submit" v-if="!loading">{{$t('auth.signIn')}}</button>
                            <button class="btn btn-lg btn-primary" type="submit" v-else disabled style="cursor: not-allowed;">{{$t('auth.Loading')}}</button>
                        </div>
                        <div class="text-center w-100">
                            <p class="fs-12 text-muted mt-4">{{$t('auth.Dont have an account?')}}
                                <a href="/register" class="text-primary">
                                    {{$t('auth.SignUp')}}
                                </a>
                            </p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
</template>

<script setup>
    import webApi from "../../api/webAxios";

    import { reactive,ref} from "vue";
    const errors = ref(null); 
    const loading = ref(false); 
    const eye = ref('fa fa-eye')

    //start design
    let loginData =  reactive({
        data:{
            email:'',
            password:'',
        }
    });
    const userLogin = async (data) => {
        loading.value=true
        errors.value='';
        await webApi.post('/web/login',data).then((result)=>{
            let l = result.data.data;
            errors.value = null;
            if(result.data.data){
                window.location.href = '/';
            }
        }).catch((e) => {
            if(e.response.status == 403){
                Swal.fire({
                    icon: 'error',
                    title: `${t('global.ThisAccountIsSuspendedPleaseReturnToSupport')}`,
                });
            }
            if(e.response.status == 402){
                Swal.fire({
                    icon: 'error',
                    title: e.response.data.message,
                });
            }else {
                errors.value = e.response.data
                setTimeout(() => errors.value = null,4000);
            }

            loading.value=false
        })
        loading.value=false
    }
    const showPassword = async () => {
      var x = document.getElementById("signin-password");
      if (x.type === "password") {
        x.type = "text";
        eye.value = 'fa fa-eye-slash'
      } else {
        x.type = "password";
        eye.value = 'fa fa-eye'
      }
    };

</script>

<style scoped>
.authentication .authentication-cover:before {
    background-color: #fbc02d;
}
.text-primary {
    color: #fbc02d !important;
}
.btn-primary {
    background-color: #fbc02d !important;
    border-color: #fbc02d !important;
}
</style>
