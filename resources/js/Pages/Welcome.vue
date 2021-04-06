<template>
    <div class="relative flex items-top justify-center min-h-screen gradient sm:items-center sm:pt-0">


        <div class="container fixed top-0 left-0 mx-auto flex">
            <div class="mx-auto p-6 text-white text-5xl">

            </div>
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
    import Button from '@/Components/SpecialButton';
    import Register from '@/Layouts/Register'

    export default {
        components: {
            Button,
            Register
        },
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },

    }
</script>
