<template>
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-lg-8">
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

                                    <div class="interact">
                                        <div class="row">
                                            <div class="col-12">
                                                <a><i class="fa fa-heart-o"></i> 1</a>
                                                <a><i class="fa fa-comment-o pl-3"></i> 1</a>
                                                <a><i class="fa fa-tumbs-up pl-3"></i> 1</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="likes pt-2">
                                        <img :src="post.user.avatar" alt="" class="like-avatars">
                                        <img :src="post.user.avatar" alt="" class="like-avatars">
                                        <img :src="post.user.avatar" alt="" class="like-avatars">
                                    </div>
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