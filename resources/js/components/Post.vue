<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <textarea rows="5" class="form-control" v-model="content"></textarea>

                    <br />

                    <button class="btn btn-success btn-sm pull-right" 
                    :disabled="not_working"
                    @click="createPost">
                        Create Post
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Noty from 'noty'

export default {
    mounted() {

    },
    data() {
        return {
            content: '',
            not_working:true
        }
    },
    methods: {
        createPost() {
            axios.post('/create/post', { content: this.content })
            .then((response) => {
                this.content = ''
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: 'Post has been published'
                }).show();
                console.log(response)
            })
            .catch()
        }
    },
    watch: {
        content() {
            if(this.content.length > 0)
                this.not_working = false
            else
                this.not_working = true
        }
    }
}
</script>