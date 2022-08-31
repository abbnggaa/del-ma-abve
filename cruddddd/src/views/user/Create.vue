<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>tambah user</h4>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="nik" class="font-weight-bold">nik</label>
                                <input type="number" class="form-control" v-model="user.nik" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.nik" class="mt-2 alert alert-danger">
                                    {{ validation.nik[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">name</label>
                                <input type="text" class="form-control" v-model="user.name" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.name" class="mt-2 alert alert-danger">
                                    {{ validation.name[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">email</label>
                                <input type="email" class="form-control" v-model="user.email" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.email" class="mt-2 alert alert-danger">
                                    {{ validation.email[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="role" class="font-weight-bold">role</label>
                                <input type="number" class="form-control" v-model="user.role" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.role" class="mt-2 alert alert-danger">
                                    {{ validation.role[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telp" class="font-weight-bold">telp</label>
                                <input type="number" class="form-control" v-model="user.telp" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.telp" class="mt-2 alert alert-danger">
                                    {{ validation.telp[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="font-weight-bold">alamat</label>
                                <textarea type="text" rows="4" class="form-control" v-model="user.alamat" placeholder="masukan data"></textarea>
                                <!-- validation -->
                                <div v-if="validation.alamat" class="mt-2 alert alert-danger">
                                    {{ validation.alamat[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">password</label>
                                <input type="text" class="form-control" v-model="user.password" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.password" class="mt-2 alert alert-danger">
                                    {{ validation.password[0] }}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">simpan</button>
                        </form>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {

    name: 'create-user',

    setup() {

        //state users
        const user = reactive({
            nik: '',
            name: '',
            email: '',
            role: '',
            alamat: '',
            telp: '',
            password: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //method store
        function store() {

            let nik   = user.nik
            let name = user.name
            let email = user.email
            let role = user.role
            let telp = user.telp
            let alamat = user.alamat
            let password = user.password

            axios.post('http://localhost:8000/api/users', {
                nik: nik,
                name: name,
                email: email,
                role: role,
                telp: telp,
                alamat: alamat,
                password: password
            }).then(() => {

                //redirect ke user index
                router.push({
                    name: 'user.index-user'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            user,
            validation,
            router,
            store
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>