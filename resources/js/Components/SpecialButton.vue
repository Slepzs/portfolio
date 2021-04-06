<template>
    <button :type="type" class="inline-flex  items-center px-4 py-2 bg-myorange border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-gradient-to-r hover:from-pink-500 hover:to-yellow-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script>
    export default {
        name: "button",
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
