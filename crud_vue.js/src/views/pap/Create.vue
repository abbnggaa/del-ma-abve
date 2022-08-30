<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>tambah catatan</h4>

                        <form @submit.prevent="store">
                            <div class="form-group">
                                <label for="name_id" class="font-weight-bold">name_id</label>
                                <input type="text" class="form-control" v-model="catatan.name_id" placeholder="Masukkan Judul catatan">
                                <!-- validation -->
                                <div v-if="validation.name_id" class="mt-2 alert alert-danger">
                                    {{ validation.name_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image_id" class="font-weight-bold">image_id</label>
                                <input type="text" class="form-control" v-model="catatan.image_id" placeholder="Masukkan Judul catatan">
                                <!-- validation -->
                                <div v-if="validation.image_id" class="mt-2 alert alert-danger">
                                    {{ validation.image_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="suhu_tubuh" class="font-weight-bold">suhu_tubuh</label>
                                <input type="text" class="form-control" v-model="catatan.suhu_tubuh" placeholder="Masukkan Judul catatan">
                                <!-- validation -->
                                <div v-if="validation.suhu_tubuh" class="mt-2 alert alert-danger">
                                    {{ validation.suhu_tubuh[0] }}
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

    name: 'create-catatan',

    setup() {

        //state catatans
        const catatan = reactive({
            name_id: '',
            image_id: '',
            suhu_tubuh: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //method store
        function store() {

            let name_id   = catatan.name_id
            let image_id = catatan.image_id
            let suhu_tubuh = catatan.suhu_tubuh

            axios.post('http://localhost:8000/api/catatan', {
                name_id: name_id,
                image_id: image_id,
                suhu_tubuh: suhu_tubuh
            }).then(() => {

                //redirect ke catatan index
                router.push({
                    name: 'catatan.index-catatan'
                })

            }).catch(error => {
                //assign state validation with error 
                validation.value = error.response.data
            })

        }

        //return
        return {
            catatan,
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
