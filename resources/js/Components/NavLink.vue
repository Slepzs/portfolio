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
                            ? 'inline-flex items-center  mx-2 border-b-2 __public_md uppercase  text-white rounded-md  border-indigo-400 text-sm text-xs shadow-link hover:shadow-linkhover font-medium leading-12 text-white transition duration-150 ease-in-out'
                            : 'inline-flex items-center  mx-2 border-b-2 __public_md uppercase  text-white rounded-md  border-transparent text-sm text-xs font-medium  leading-12 text-white  transition duration-150 ease-in-out'
            }
        }
    }
</script>
