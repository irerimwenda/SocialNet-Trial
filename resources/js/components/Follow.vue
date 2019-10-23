<template>

<div class="follow-container">
    <div class="card">
        <div class="card-body">
            <h4>People you may know.</h4>
            <hr>
            <div class="row" v-for="friend in friends" :key="friend.id">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <img :src="friend.avatar" alt="" class="people-you-know-img">
                        </div>
                        <div class="col-sm-9">
                            <a :href="/profile/ + friend.slug"><span>{{friend.name}}</span></a>
                            <br/>
                            <span v-if="friend.profile">{{friend.profile.about}}</span>
                            <span v-else><i>--No Description--</i></span>
                            <br/>
                            <a href="http://" class="btn btn-sm btn-light mt-2">+ Friend</a>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
    
</template>

<script>
export default {
    mounted() {
        this.getNewFriends();
    },
    data() {
        return {
            friends: []
        }
    },
    methods: {
        getNewFriends() {
            axios.get('/new-friends')
            .then((response) => {
                this.friends = response.data
            })
            .catch()
        }
    }
}
</script>