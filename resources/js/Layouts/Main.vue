<template>
    <div class="h-full flex flex-col items-center pt-6 sm:pt-0 gradient_c bg-gray-100">
        <Navigation />
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
    /* background-image: linear-gradient( 76.3deg,  rgba(44,62,78,1) 12.6%, rgba(69,103,131,1) 82.8% ); */

    background-image: linear-gradient( 76.3deg,  rgb(2 1 4) 12.6%, rgb(38 31 51) 82.8% );

}
</style>

<script>

import Navigation from '@/Components/Navigation';
export default {
    name: 'Main',
    components: {
        Navigation
    }
}
</script>
