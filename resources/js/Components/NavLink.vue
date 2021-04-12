<template>
    <inertia-link :href="href" :class="classes">
        <slot />
    </inertia-link>
</template>

<script>
    export default {
        props: ['href', 'active'],
        computed: {
            classes() {
                return this.active
                            ? 'inline-flex items-center px-2 pt-1 mx-1 border-b-2 __public_md uppercase border-indigo-400 text-sm shadow-link hover:shadow-linkhover font-medium leading-12 text-white transition duration-150 ease-in-out'
                            : 'inline-flex items-center px-2 pt-1 mx-1 border-b-2 __public_md uppercase border-transparent text-sm font-medium  leading-12 text-white  transition duration-150 ease-in-out'
            }
        }
    }
</script>
