<template>

<div class="container">

</div>
    
</template>

<script>
export default {
    mounted() {
        this.getAuthUserData()
    },
    methods: {
        getAuthUserData() {
            axios.get('/get-auth-user-data')
            .then((response) => {
                this.$store.commit('auth_user_data', response.data)
            })
            .catch()
        }
    }
}
</script>