<template>



    <div class="container py-2">

        <div class="max-w-screen-lg mx-auto grid gap-6 px-6 grid-70-30">
            <div class="flex w-full border-4 my-4 border-morange bg-mblue box-shadow-st justify-center mx-auto flex-wrap">
                <h1 class="Varela p-2 bg-morange  text-white text-2xl w-full">Create Article</h1>
               <div class="p-6">
                   <form class="w-full bg-transparent border-0" @submit.prevent="submit">
                       <div class="grid gap-2 grid-cols-2">
                           <label class="block text-lg  py-2 my-2 text-white" for="title">Title<input class="block w-full text-black" v-model="form.title" name="title" type="text" placeholder="Write an title"></label>
                           <label class="block text-lg  py-2 my-2 text-white" for="category">
                               Category
                               <select class="block w-full text-mblack" name="category"  v-model="form.category" id="category" value="Select" placeholder="Categories">
                                   <option value="Linux">Linux</option>
                                   <option>CSS</option>
                                   <option>PHP</option>
                                   <option>Javascript</option>
                               </select>
                           </label>
                       </div>
                       <input style="display: none;" class="col-span-2" id="image_file" type="file" @input="form.image = $event.target.files[0]" />
                       <div @click="imgupload()" class="cursor-pointer block w-full border-2 border-white py-12">
                           <p class="text-white uppercase flex justify-center align-center">Upload Image</p>
                       </div>
                       <label class="block text-lg py-2 my-2 text-white" for="content">Write Post using Markdown </label>
                       <div class="grid grid-cols-2 gap-2">
                       <textarea  v-model="form.content" class="w-full py-4" name="content" id="mdeditor" cols="30"
                               rows="20"></textarea>
                           <div class="text-black custom_text p-4 bg-white" v-html="compiledMarkdown"></div>
                       </div>

                       <button class="block w-32 py-2 px-4 my-4 uppercase bg-morange text-white" type="submit">Submit</button>
                   </form>
               </div>
            </div>
            <div class="w-full  my-4 justify-center mx-auto flex-wrap">
                <div class="text-white w-full box-shadow-st bg-mblue">
                    <p class="Varela p-2 bg-morange ">Editor Basic</p>
                    <table class="border-collapse block border-1 border-morange">
                        <tr class="border-2 border-morange ">
                            <td># Header <br />
                                ... <br />
                                ###### Header</td>
                            <td>
                                H1 Header <br />
                                ... <br />
                                H6 Header
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>*italics* or _italics_</td>
                            <td>
                                italics
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>**bold**	</td>
                            <td>
                                bold
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>[Link](https://...)		</td>
                            <td>
                                Link
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>* item 1 <br/>
                                * item 2	</td>
                            <td>
                                item 1
                                item 2
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>1. item 1<br/>
                                2. item 2
                            </td>
                            <td>
                                item 1
                                item 2
                            </td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>> quoted text
                            </td>
                            <td>quoted text</td>
                        </tr>
                        <tr class="border-2 border-morange p-1">
                            <td>
                                ![image info](/storage/id/name)
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <ImagePicker :medias="medias"></ImagePicker>
            </div>
        </div>
    </div>


</template>

<style scoped>

.box-shadow-st {
  box-shadow: 0px 0px 3px black;
}

.custom_text p {
    margin: 20px 0px;
}

</style>


<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
import NavLink from '@/Components/NavLink';
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import marked from 'marked';
import ImagePicker from '@/Components/ImagePicker';

export default {
    name: 'createArticle',
    layout: Main,
    components: {
        Logo,
        NavLink,
        ImagePicker
    },
    props: ['medias'],
    data() {
        return {
            form: {
                title: null,
                category: null,
                content: 'test',
                image: null
            }
        }
    },
    methods: {
        imgupload() {
            return document.getElementById('image_file').click();
        },
    },
    computed: {
        compiledMarkdown: function() {
            if(this.form.content != null) {
                return marked(this.form.content, { sanitize: true });
            }
        },
        tableTD() {
            return document.querySelectorAll('td').forEach(element => element.classList.add('p-1'));
        }
    },
    setup () {
        const user = usePage().props.value.auth.user.id;
        const form = useForm({
            user_id: user,
            title: null,
            category: null,
            content: null,
            image: null
        })
        function submit() {
            Inertia.post('/articles/', form, {
                _method: 'put',
                forceFormData: true,
                onSuccess: () => form.reset()
            })
        }
        return { form, submit }
    },
}
</script>
