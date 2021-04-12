<template>
    <Navigation />




    <div class="container heightMinusNav h-full">
            <div class="grid h-full items-center justify-center sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 content-center">
                <div class="relative justify-self-center">
                        <img @mouseover="hover = true" @mouseleave="hover = false" :class="{ active: hover }" class="block w-80 bg-white rounded-full p-2" src="/img/wizard.png" alt="A wizard in disguise">
                </div>
                <div class="grid p-2 content-center">
                    <p class="text-white text-2xl py-4  sm:text-4xl __public_light max-w-lg leading-tight"> <span class="__public_md">
                        <a class="no-underline shadow-link hover:shadow-linkhover transition-shadow duration-800" href="https://github.com/slepzs" target="_blank">Tobias</a> Heide</span></p>
                    <p class="text-white text-2xl py-4 sm:text-4xl __public_light max-w-lg leading-tight">I'm a Web Developer from Denmark</p>
                    <p class="text-white text-2xl py-4 sm:text-4xl __public_light max-w-lg leading-tight">This website is being developed in April 2021</p>
                    <p class="text-white text-2xl py-4 sm:text-4xl __public_light max-w-lg leading-tight">And is the start to something great</p>
                </div>
            </div>
    </div>







</template>


<style scoped>

.heightMinusNav {
    height: calc(100vh - 90px);
}

</style>


<script>
import Main from '@/Layouts/Main';
import Navigation from '@/Components/Navigation';

export default {
    layout: Main,
    data() {
        return {
            hover: false,
        }
    },
    components: {
        Navigation
    }
}
</script>
