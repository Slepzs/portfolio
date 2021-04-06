<template>
    <div class="h-full flex flex-col items-center pt-6 sm:pt-0 gradient bg-gray-100">
        <slot />
    </div>
</template>

<style scoped>
.gradient {
    background-image: url('/img/RG.svg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
</style>

<script>


export default {
    name: 'Main'
}
</script>
