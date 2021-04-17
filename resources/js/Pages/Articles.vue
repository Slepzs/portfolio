<template>



    <div class="container py-2">

        <h1 class="text-white w-full block text-6xl my-12 text-center">Articles</h1>

        <div class="flex mx-auto flex-wrap">
            <div v-for="article in articles" :key="article">
                <a :href="route('articles.show', [article.slug])">
                    <div class="max-w-md w-96  border-2 border-morange py-4 px-8 bg-mblue mx-4 shadow-lg rounded-lg my-20">
                        <div class="flex justify-center md:justify-end -mt-16 ">
                            <img class="w-20 h-20 object-cover rounded-full border-2 border-morange p-2 bg-white" :src="article.image">
                        </div>
                        <div class="p-2">
                            <h2 class="text-white text-lg">{{ article.title }}</h2>
                            <p class="mt-2 text-morange">{{ article.content }}</p>
                        </div>
                        <div class="flex justify-end mt-4">
                            <a href="#" class="text-sm font-medium text-morange">Af Tobias Heide</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


</template>




<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
import NavLink from '@/Components/NavLink';
export default {
    layout: Main,
    props: ['articles'],
    components: {
        Logo,
        NavLink
    },
}
</script>
