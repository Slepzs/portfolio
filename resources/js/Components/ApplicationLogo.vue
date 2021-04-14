<template>
    <div class="container" width="250px">
        <div class="flex py-1 my-2 justify-center align-center">
            <img @mouseover="hover = true" @mouseleave="hover = false" :class="{ active: hover }" class="col-span-1 w-9 block bg-white rounded-full border-2 border-morange mx-2 " :width="width" src="/img/wizard.png" alt="Its not a wizard">
            <h2 class="col-span-2 text-white text-xs uppercase self-center mx-2 relative">notawizard.dev</h2>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Logo',
    data() {
        return {
            active: false
        }
    },
    computed: {
        width() {
            return 50;
        },
    }
}
</script>
