<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>data catatan</h4>
                        <router-link :to="{name: 'catatan.create-catatan'}" class="btn btn-md btn-success">tambah
                            catatan</router-link>

                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">suhu tubuh</th>
                                    <th scope="col">image</th>
                                    <th scope="col">options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(catatan, index) in catatans" :key="index">
                                    <td>{{ catatan.id }}</td>
                                    <td>{{ catatan.user.name }}</td>
                                    <td>{{ catatan.suhu_tubuh }}</td>
                                    <td>{{ catatan.pap.image }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'catatan.edit-catatan', params:{id: catatan.id }}"
                                            class="btn btn-sm btn-primary mr-1">edit</router-link>
                                        <button @click.prevent="catatanDelete(catatan.id)" class="btn btn-sm btn-danger ml-1">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import {
        onMounted,
        ref
    } from 'vue'

    export default {

        name: 'index-catatan',

        setup() {

            //reactive state
            let catatans = ref([])

            //mounted
            onMounted(() => {

                //get API from Laravel Backend
                axios.get('http://localhost:8000/api/catatan')
                    .then(response => {

                        //assign state catatans with response data
                        catatans.value = response.data.data

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            })

            //method delete
            function catatanDelete(id) {

                //delete data catatan by ID
                axios.delete(`http://localhost:8000/api/catatan/${id}`)
                    .then(() => {

                        //splice catatans 
                        catatans.value.splice(catatans.value.indexOf(id), 1);

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            }

            //return
            return {
                catatans,
                catatanDelete
            }

        }

    }

</script>

<style>
    body {
        background: lightgray;
    }

</style>
