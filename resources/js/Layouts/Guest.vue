<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 gradient bg-gray-100">
        <div>
            <inertia-link href="/">
                <breeze-application-logo :width="50" />
            </inertia-link>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden">
            <slot />
        </div>
    </div>
</template>

<style scoped>
.gradient {
    background-image: url('/img/RG.svg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
</style>

<script>
    import BreezeApplicationLogo from '@/Components/ApplicationLogo'

    export default {
        components: {
            BreezeApplicationLogo,
        }
    }
</script>
