<template>
    <button :type="type" class="inline-flex px-4 py-2 bg-morange border text-left border-transparent font-semibold text-xs text-white uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
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
