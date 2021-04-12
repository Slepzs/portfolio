<template>
    <div class="container w-full py-4">
        <div class="grid grid-cols-2">
            <div class="sm:block justify-self-start">
                <inertia-link href="/">
                    <Logo />
                </inertia-link>
            </div>
            <div class="self-center justify-self-end">
                <ul class="flex ">
                    <li><Link :href="route('home')">home</Link></li>
                    <li><Link :href="route('articles')">Articles</Link></li>
                    <li><Link :href="route('login')">Demo Project</Link></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>


import Link from '@/Components/NavLink'
import Logo from '@/Components/ApplicationLogo';


export default {
    name: "Navigation",
    components: {
        Logo,
        Link,
    }
}
</script>

<style scoped>

</style>
