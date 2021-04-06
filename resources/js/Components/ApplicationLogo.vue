<template>
    <img :width="width" src="/img/wizard.png" alt="Its not a wizard">
</template>

<script>
export default {
    props: ['width'],
    computed: {
        width() {
            return this.width * 2;
        },
    }
}
</script>
