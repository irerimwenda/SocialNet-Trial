<template>
    <div>

    </div>
</template>


<script>
import Noty from 'noty';

export default {
    mounted() {
        this.listen()
    },
    props: ['id'],
    methods: {
        listen() {
            Echo.private('App.User.' + this.id)
                .notification((notification) => {
                    //alert('new notification')
                    new Noty({
                        type: 'success',
                        layout: 'bottomLeft',
                        text: notification.name + notification.message
                    })
                    //console.log(notification)
                    document.getElementById("noty_audio").play()
                })
        }
    }
}
</script>