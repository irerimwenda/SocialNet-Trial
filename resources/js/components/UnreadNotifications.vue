<template>

    <li>
        <a class="nav-link" href="/notifications">
            <i class="fa fa-bell"></i>
            <span class="badge badge-secondary">{{all_notifications_count}}</span>
        </a>
    </li>

</template>

<script>
export default {
    mounted() {
        this.getUnread()
    },
    methods: {
        getUnread() {
            axios.get('/get-unread')
            .then((notifications) => {
                //console.log(notifications)
                notifications.data.forEach((notification) => {
                    this.$store.commit('add_notification', notification)
                })
            })
            .catch();
        }
    },
    computed: {
        all_notifications_count() {
            return this.$store.getters.all_notifications_count
        }
    }
}
</script>