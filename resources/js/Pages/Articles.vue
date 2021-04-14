<template>



    <div class="container py-2">

        <h1 class="text-white w-full block text-6xl my-12 text-center">Articles</h1>

        <div class="flex justify-center mx-auto flex-wrap">
            <div v-for="i in 6" :key="i">
                <a :href="route('home')">
                    <div class="max-w-md border-2 border-morange py-4 px-8 bg-mgrey mx-4 shadow-lg rounded-lg my-20">
                        <div class="flex justify-center md:justify-end -mt-16 ">
                            <img class="w-20 h-20 object-cover rounded-full border-2 border-morange p-2 bg-white" src="/img/wizard.png">
                        </div>
                        <div class="p-2">
                            <h2 class="text-white text-lg">How to fix Linux mint login loop 2021</h2>
                            <p class="mt-2 text-morange">So you've stumbled across this post. And this is your last shot. Now let me teach you how to fix it.</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="#" class="text-sm font-medium text-morange">Af Tobias Heide</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


</template>




<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
import NavLink from '@/Components/NavLink';
export default {
    layout: Main,
    components: {
        Logo,
        NavLink
    },
}
</script>
