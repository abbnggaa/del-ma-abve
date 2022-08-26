<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h4>data user</h4>

                        <router-link :to="{name: 'user.create-user'}" class="btn btn-md btn-success">tambah user
                        </router-link>

                        <table class="table table-striped table-bordered mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">no. telp</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in user" :key="index">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.nik }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.telp }}</td>
                                    <td>{{ user.alamat }}</td>
                                    <td class="text-center">
                                        <router-link :to="{name: 'user.edit-user', params:{id: user.id }}"
                                            class="btn btn-sm btn-primary mr-1">edit</router-link>
                                        <button @click.prevent="userDelete(user.id)"
                                            class="btn btn-sm btn-danger ml-1">delete</button>
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

        name: 'index-user',

        setup() {

            //reactive state
            let user = ref([])

            //mounted
            onMounted(() => {

                //get API from Laravel Backend
                axios.get('http://localhost:8000/api/users')
                    .then(response => {

                        //assign state user with response data
                        user.value = response.data.data

                    }).catch(error => {
                        console.log(error.response.data)
                    })

            })

            function userDelete(id) {

                //delete data post by ID
                axios.delete(`http://localhost:8000/api/users/${id}`)
                    .then(() => {

                            // splice users
                            const index = this.user.findIndex(user => user.id === id) // find the user index
                            if (~index) {
                                // if the user exists in array
                                this.user.splice(index, 1)
                            }

                            }).catch(error => {
                            console.log(error.response.data)
                        })

                    }

                //return
                return {
                    user,
                    userDelete
                }

            }

        }

</script>

<style>
    body {
        background: lightgray;
    }

</style>
