<template>
    <div class="container" style="width: 400px;">
        <div class="flex py-1 justify-center align-center">
            <img class="col-span-1" :width="width" src="/img/wizard.png" alt="Its not a wizard">
            <h2 class="col-span-2 text-white text-2xl self-center relative">Not a wizard</h2>
        </div>
    </div>
</template>

<script>
export default {
    props: ['width'],
    computed: {
        width() {
            return 50;
        },
    }
}
</script>
