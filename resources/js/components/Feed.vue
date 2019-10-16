<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row" v-for="post in posts" :key="post.id">
                                <div class="col-md-1">
                                    <!--image -->
                                </div>

                                <div class="col-md-9">
                                    <!-- post -->
                                    <h6 class="username">{{post.user.name}}</h6>
                                    <p>{{post.content}}</p>
                                </div>

                                <div class="col-md-2">
                                    <!-- time -->

                                </div>

                                <hr class="hr-line">                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
export default {
    mounted() {
        this.getFeed();
    },
    methods: {
        getFeed() {
            axios.get('/feed')
            .then((response) => {
                response.data.forEach((post) => {
                    this.$store.commit('add_post', post)
                });
            })
        }
    },
    computed: {
        posts() {
            return this.$store.getters.all_posts
        }
    }
}
</script>