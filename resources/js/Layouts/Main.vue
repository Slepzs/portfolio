<template>
    <main>

        <!-- Simple Navigation -->
        <div class="h-full flex flex-col items-center pt-6 sm:pt-0 gradient_c ">
            <header class="w-full bg-morange">
                <div class="grid grid-cols-2 px-6 max-w-screen-lg mx-auto ">
                    <div class="sm:block bg-mblack px-4 justify-self-start">
                        <inertia-link href="/">
                            <Logo />
                        </inertia-link>
                    </div>
                    <div class="self-center flex flex-wrap  justify-self-end">
                        <ul class="flex self-center">
                            <li><Link :href="route('home')">Home</Link></li>
                            <li><Link :href="route('articles.index')">Articles</Link></li>
                            <li><Link :href="route('articles.create')">Make Article</Link></li>
                            <li><Link :href="route('login')">Demo</Link></li>
                            <li v-if="$page.props.auth.user != null ">
                                <Link :href="route('logout')" method="post" as="button">Logout</Link>
                            </li>
                        </ul>
                    <!-- Simple profile settings -->
                    <div class="w-8">
                        <div>
                            <img class="block bg-white rounded-full border-2 border-morange mx-2 " src="/img/wizard.png" alt="profile picture">
                            <!-- dropdown -->
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>


                    </div>
                </div>

            </header>
            <div class="container w-full py-4">

                <section>

                         <slot />

                </section>
            </div>
        </div>




    </main>
</template>

<style scoped>
.gradient {
    background-image: url('/img/RG.svg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

.gradient_c {
    background: #0F2027;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #121212, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
</style>

<script>

import Logo from '@/Components/ApplicationLogo';
import Link from '@/Components/NavLink';

export default {
    name: 'Main',
    components: {
        Logo,
        Link
    }
}
</script>
