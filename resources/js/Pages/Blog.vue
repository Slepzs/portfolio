<template>

 <div class="container py-2">
     <div class="flex justify-around flex-wrap">
         <div class="sm:block">
             <inertia-link href="/">
                 <Logo />
             </inertia-link>
         </div>
         <ul class="self-center flex ">
             <li><NavLink :href="route('home')">Home</NavLink></li>
             <li><NavLink>Blog</NavLink></li>
             <li><NavLink :href="route('login')">Demo</NavLink></li>
         </ul>
     </div>
 </div>







    <div class="container h-screen flex justify-center">
        <div class="flex flex-wrap justify-center content-center">
            <div class="grid  sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 content-center">
                <div class="grid p-2 content-center">
                    <p class="text-white text-2xl  sm:text-4xl __public_light max-w-lg leading-tight">This page doesn't exist yet 404 - Or i haven't made it yet..</p>

                </div>
                <div class="p-2">
                    <img class="block sm:max-w-lg" src="/img/wizard.png">
                </div>
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
