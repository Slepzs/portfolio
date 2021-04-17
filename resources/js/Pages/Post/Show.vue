<template>

    <div class="max-w-screen-lg mx-auto">
        <div class="grid grid-15-60-25 gap-4 py-8 my-8">
            <!-- Social media -->
            <div class="text-white">
                Social Media
            </div>
            <!-- Content -->
            <div>
                <div class="cover">
                    <img class="object-cover" v-if="article.image" :src="article.image" alt="Cover image">
                </div>
                <div class="text-white my-8">
                    {{ article.content }}
                </div>
            </div>
            <!-- Author Notes -->
            <div class="text-white">
                <!-- Delete Article -->

                <SpecialButton @click="deleteArticle" class="block my-2 p-2 w-full hover:bg-mblue">Delete Article <svg-vue class="inline w-6 h-6" icon="darthvader"></svg-vue></SpecialButton>
                <!-- Author Panel -->
                <div class="block mbg border-2 border-mblue">
                    <img :src="article.image" alt="">
                    <div class="p-4">
                        <p class="my-2">By Tobias Heide</p>
                        <hr>
                        <ul class="my-2">
                            <li>Developer from Denmark</li>
                            <li>Graduated 2019</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


</template>

<script>
import Main from '@/Layouts/Main';
import {Inertia} from "@inertiajs/inertia";
import SpecialButton from '@/Components/SpecialButton';

export default {
    name: "Show.vue",
    layout: Main,
    components: {
        SpecialButton
    },
    props: ['article'],
    data() {
      return {
          id: this.article.id
      }
    },
    methods: {
    deleteArticle() {
        Inertia.delete(`/articles/${this.article.id}`);
        }
    }
}
</script>

<style scoped>

</style>
