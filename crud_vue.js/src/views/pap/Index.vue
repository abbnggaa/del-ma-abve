<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>data pap</h4>
                        <router-link :to="{name: 'pap.create-pap'}" class="btn btn-md btn-success">tambah
                            pap</router-link>

                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">gambar</th>
                                    <th scope="col">options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pap, index) in paps" :key="index">
                                    <td>{{ pap.id }}</td>
                                    <td>{{ pap.user.name }}</td>
                                    <td>{{ pap.image }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'pap.edit-pap', params:{id: pap.id }}"
                                            class="btn btn-sm btn-primary mr-1">edit</router-link>
                                        <button @click.prevent="papDelete(pap.id)" class="btn btn-sm btn-danger ml-1">DELETE</button>
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

        name: 'index-pap',

        setup() {

            //reactive state
            let paps = ref([])

            //mounted
            onMounted(() => {

                //get API from Laravel Backend
                axios.get('http://localhost:8000/api/pap')
                    .then(response => {

                        //assign state paps with response data
                        paps.value = response.data.data

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            })

            //method delete
            function papDelete(id) {

                //delete data catatan by ID
                axios.delete(`http://localhost:8000/api/pap/${id}`)
                    .then(() => {

                        //splice catatans 
                        paps.value.splice(paps.value.indexOf(id), 1);

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            }

            //return
            return {
                paps,
                papDelete
            }

        }

    }

</script>

<style>
    body {
        background: lightgray;
    }

</style>
