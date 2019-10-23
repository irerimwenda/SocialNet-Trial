<template>
    <div class="container">
        <div class="interact">
            <div class="row">
                <div class="col-12">
                    <a><i class="fa fa-heart-o"></i> 1</a>
                    <a><i class="fa fa-heart"></i> 1</a>
                    <a><i class="fa fa-comment-o pl-3"></i> 1</a>
                    <a><i class="fa fa-tumbs-up pl-3"></i> 1</a>
                </div>
            </div>
        </div>
        <div class="likes pt-2">
            <div class="row" v-for="like in post.likes" :key="like.id">
                 <img :src="post.user.avatar" alt="" class="like-avatars">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {

    },
    props: ['id'],
    computed: {
        likes() {
            var likers = []

            this.post.likes.forEach((like) => {
                likers.push(like.user.id)
            })

            return likers
        },
        authUserLikesPost() {
            var checkIndex = this.likers.indexOf(
                this.$store.state.auth_user.id
            )

            if(checkIndex === -1)
                return false
            else
                return true
        },
        post() {
            return this.$store.state.posts.find((post) => {
                return post.id === this.id
            })
        }
    }
}
</script>