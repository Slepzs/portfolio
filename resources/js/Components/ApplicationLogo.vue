<template>
    <div class="container" width="250px">
        <div class="flex py-1 justify-center align-center">
            <img class="col-span-1 block bg-white rounded-full mx-2 " :width="width" src="/img/Tobias.png" alt="Its not a wizard">
            <h2 class="col-span-2 text-white text-sm self-center mx-2 relative">Not a wizard</h2>
        </div>
    </div>
</template>

<script>
export default {
    props: ['width'],
    computed: {
        width() {
            return 50;
        },
    }
}
</script>
