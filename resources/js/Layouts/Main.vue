<template>
    <div class="h-full flex flex-col items-center pt-6 sm:pt-0 gradient_c bg-gray-100">

        <!-- Simple Navigation -->
        <div class="container w-full py-4">
            <div class="grid grid-cols-2">
                <div class="sm:block justify-self-start">
                    <inertia-link href="/">
                        <Logo />
                    </inertia-link>
                </div>
                <div class="self-center justify-self-end">
                    <ul class="flex ">
                        <li><Link :href="route('home')">Home</Link></li>
                        <li><Link :href="route('articles.index')">Articles</Link></li>
                        <li><Link :href="route('articles.create')">Make Article</Link></li>
                        <li><Link :href="route('login')">Demo</Link></li>
                        <li v-if="$page.props.auth.user != null ">
                            <Link :href="route('logout')" method="post" as="button">Logout</Link>
                        </li>
                    </ul>


                </div>
            </div>
        </div>

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
