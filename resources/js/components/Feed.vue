<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row" v-for="post in posts" :key="post.id">
                                <div class="col-md-1 text-center pl-0 pr-0">
                                    <!--image -->
                                    <img :src="post.user.avatar" class="user-avatar">
                                </div>

                                <div class="col-md-9 pl-4">
                                    <!-- post -->
                                    <span class="username pb-0">{{post.user.name}}</span>
                                    <p class="feed-p pt-0">{{post.content}}</p>

                                    <like :id="post.id"></like>

                                    <hr>
                                </div>

                                <div class="col-md-2">
                                    <!-- time -->
                                    <span>{{post.created_at}}</span>
                                </div>

                                <hr>                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<script>
import Like from './Like.vue'

export default {
    mounted() {
        this.getFeed();
    },
    components: {
        Like
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