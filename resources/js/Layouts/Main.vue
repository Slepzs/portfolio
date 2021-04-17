<template>
    <main>

        <!-- Simple Navigation -->
        <div class="h-full flex flex-col items-center pt-6 sm:pt-0 bg-custom-gradient ">
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
                            <li v-if="$page.props.auth.user != null"><Link :href="route('articles.create')">Make Article</Link></li>
                            <li v-if="$page.props.auth.user != null">
                                <Link :href="route('logout')" method="post" as="button">Logout</Link>
                            </li>
                        </ul>
                    <!-- Simple profile settings -->
                    <div class="w-8">
                        <div>
                            <a :href="route('login')"><img class="block bg-white rounded-full border-2 border-morange mx-2 " src="/img/wizard.png" alt="profile picture"></a>
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
