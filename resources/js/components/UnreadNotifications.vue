<template>

    <li>
        <a href="">
            | Unread notifications
            <span class="badge badge-secondary">7</span>
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
                console.log(notifications)
            })
            .catch();
        }
    }
}
</script>