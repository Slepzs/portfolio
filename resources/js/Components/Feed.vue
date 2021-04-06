<template>
    <div :feed="feed" v-for="item in feed" :key="item" class="my-2">
        <div class="grid items-center bg-white leading-none text-purple-600 m-2 rounded-lg p-2 shadow text-teal text-sm">
                <div class="grid grid-cols-2">
                    <span class="cursor-pointer m-1 justify-self-right" v-on:click="deletePost(item)">X</span>
                    <img v-if="item.media[0]?.id" class="rounded-lg w-16 justify-self-end" :src="`/storage/${item.media[0]?.id}/${item.media[0]?.file_name}`" alt="An image.. "/>
                </div>

               <span class="block bg-indigo-600 text-white py-3 text-center my-2 rounded-lg justify-center items-center">
                 {{ item.description }}
               </span>

                <span>
                    {{ item.created_at }}
                </span>
        </div>
    </div>
</template>

<script>

import {Inertia} from "@inertiajs/inertia";
export default {
    name: "Feed",
    props: ['feed'],
    methods: {
        deletePost(item) {
            Inertia.delete(`/feed/${item.id}`);
        }
    }

}
</script>

<style scoped>

</style>
