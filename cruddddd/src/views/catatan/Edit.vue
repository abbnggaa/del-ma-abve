<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>edit catatan</h4>

                        <form @submit.prevent="update">
                            <div class="form-group">
                                <label for="name_id" class="font-weight-bold">name_id</label>
                                <input type="number" class="form-control" v-model="catatan.name_id" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.name_id" class="mt-2 alert alert-danger">
                                    {{ validation.name_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image_id" class="font-weight-bold">image_id</label>
                                <input type="text" class="form-control" v-model="catatan.image_id" placeholder="masukan data">
                                <!-- validation -->
                                <div v-if="validation.image_id" class="mt-2 alert alert-danger">
                                    {{ validation.image_id[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="suhu_tubuh" class="font-weight-bold">suhu_tubuh</label>
                                <input type="suhu_tubuh" class="form-control" v-model="catatan.suhu_tubuh" placeholder="masukan data">
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
import { reactive, ref, onMounted } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import axios from 'axios'

export default {

    name: 'edit-catatan',

    setup() {

        //state catatan
        const catatan = reactive({
            name_id: '',
            image_id: '',
            suhu_tubuh: ''
        })

        //state validation
        const validation = ref([])

        //vue router
        const router = useRouter()

        //vue router
        const route = useRoute()

        //mounted
        onMounted(() => {

            //get API from Laravel Backend
            axios.get(`http://localhost:8000/api/catatan/${route.params.id}`)
            .then(response => {
              
              //assign state catatan with response data
              catatan.name_id    = response.data.data.name_id  
              catatan.image_id  = response.data.data.image_id  
              catatan.suhu_tubuh  = response.data.data.suhu_tubuh  

            }).catch(error => {
                console.log(error.response.data)
            })

        })

        //method update
        function update() {

            let name_id   = catatan.name_id
            let image_id = catatan.image_id
            let suhu_tubuh = catatan.suhu_tubuh

            axios.put(`http://localhost:8000/api/catatan/${route.params.id}`, {
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
            update
        }

    }

}
</script>

<style>
    body{
        background: lightgray;
    }
</style>