<template>
    <div class="container">
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
    </div>
</template>

<script>
export default {
    mounted() {

    },
    props: ['id'],
}
</script>