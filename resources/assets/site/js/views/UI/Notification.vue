<template>
    <div :class="{hidden}" class="films__notify" >

        <div class="films__notify-item" v-for="message in messages" :key="message">
            {{ message }}
        </div>

    </div>
</template>

<script>
export default {
    name: "Notification",
    data() {
        return {
            hidden: false
        }
    },
    props: {
        messages: {
            type: Object,
        },
    },
    mounted() {
        this.vanishingNotification()
        this.$emit('getInvalids')
    },
    methods: {
        vanishingNotification() {
            setTimeout(() => {
                this.hidden = true
            }, 4000)
            setTimeout(() => {
                this.$store.commit('setMessage', null);
            }, 4300)
        }
    },
}
</script>
