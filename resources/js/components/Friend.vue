<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
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
                console.log(response);
            })
            .catch();
        },
        props: ['profile_user_id'],
    }
</script>
