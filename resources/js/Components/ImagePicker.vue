<template>
    <div class="overflow-y-scroll my-4 box-shadow-st text-white w-full bg-mblue">
        <p class="Varela p-2 bg-morange flex">Pick Img
        <span @click="upload_images" class="align-self-end mx-2 cursor-pointer">upload</span>
        <form @submit.prevent="submit" style="display: none;" action="" method="POST" enctype="multipart/form-data">
        <input id="imagepicker_more" type="file" @input="images = $event.target.files" @change="submit()" name="images" multiple />
        </form>

        </p>
        <div class="flex my-2 flex-wrap h-60 ">
            <div v-for="media in medias" :key="media" class="w-20 h-20 m-4 border-2 border-white">
                <img class="cursor-pointer" @click="path" :src="`/storage/${media.id}/${media?.file_name}`" ref="image">
            </div>
        </div>
    </div>
</template>

<script>
import {Inertia} from "@inertiajs/inertia";
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "image_picker",
    props: ['medias'],
    data() {
        return {
            images: []
        }
    },
    methods: {
        upload_images() {
            return document.querySelector('#imagepicker_more').click();

        },
        copyToClipboard(text) {
            if (window.clipboardData && window.clipboardData.setData) {
                // IE specific code path to prevent textarea being shown while dialog is visible.
                return clipboardData.setData("Text", text);

            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    return document.execCommand("copy");  // Security exception may be thrown by some browsers.
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return false;
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        },
        path() {
            let $image = this.$refs.image;
            return console.log(this.copyToClipboard(`![image info](${$image.getAttribute('src')})`));
        },
        submit() {
            const form = useForm({
                images: this.images
            })
            console.log(form);
            Inertia.post('/image/upload', form, {
                _method: 'POST',
                forceFormData: true,
                onSuccess: () => form.reset()
            });
        },
    }
}
</script>

<style scoped>

</style>
