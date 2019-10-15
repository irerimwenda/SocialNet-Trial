<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="text-center" v-if="loading">
                    Loading...
                </p>

                <p class="text-center" v-if="!loading">
                    <button class="btn btn-success btn-sm" v-if="status == 0" @click="addFriend">Add Friend</button>
                    <button class="btn btn-success btn-sm" v-if="status == 'pending'" @click="acceptFriend">Accept Friend</button>
                    <span class="text-info" v-if="status == 'waiting'">Waiting for response</span>
                    <span class="text-success" v-if="status == 'friends'">Friends</span>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            //console.log('Component mounted.')
            axios.get('/check_relationship_status/' + this.profile_user_id)
            .then(response => {
                //console.log(response);
                this.status = response.data.status
                this.loading = false
            })
            .catch();
        },
        props: ['profile_user_id'],
        data() {
            return {
                status: '',
                loading: true
            }
        },
        methods: {
            addFriend() {
                this.loading = true
                axios.get('/add-friend/' + this.profile_user_id)
                .then((response) => {
                    //console.log(response);
                    if(response.data == 1)
                        this.status = 'waiting'
                        this.loading = false
                })
                .catch();
            },
            acceptFriend() {
                this.loading = true
                axios.get('/accept-friend/' + this.profile_user_id)
                .then((response) => {
                    if(response.body == 1)
                    this.status = 'friends'
                    this.loading = false
                })
                .catch();
            }
        }
    }
</script>
