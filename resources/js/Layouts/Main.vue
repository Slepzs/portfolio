<template>
    <div class="h-screen flex flex-col items-center pt-6 sm:pt-0 gradient_c bg-gray-100">
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

.gradient_c {
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
}
</style>

<script>


export default {
    name: 'Main'
}
</script>
