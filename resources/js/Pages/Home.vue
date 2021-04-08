<template>


    <inertia-link href="/">
        <Logo :width="50" />
    </inertia-link>


</template>

<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
export default {
    layout: Main,
    components: {
        Logo
    },
}
</script>
