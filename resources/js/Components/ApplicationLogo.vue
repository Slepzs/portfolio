<template>
    <div class="grid gap-1 grid-cols-3 p-3 m-2 justify-center align-center">
        <img class="col-span-1" :width="width" src="/img/wizard.png" alt="Its not a wizard">
        <h2 class="col-span-2 text-white text-2xl self-center relative">Not A wizard <span class="text-xs absolute -top-3 right-0 left-0">It's a portfolio</span></h2>
    </div>
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
