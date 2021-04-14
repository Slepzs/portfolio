<template>



    <div class="container py-2">

        <div class="max-w-screen-lg mx-auto grid gap-6 px-6 grid-70-30">
            <div class="flex w-full border-4 my-4 border-morange bg-mgrey box-shadow-st justify-center mx-auto flex-wrap">
                <h1 class="Varela p-2 bg-morange  text-white text-2xl w-full">Create Article</h1>
               <div class="p-6">
                   <form class="w-full" @submit.prevent="submit">
                       <div class="grid gap-2 grid-cols-2">
                           <label class="block text-lg  py-2 my-2 text-white" for="title">Title<input class="block w-full text-black" v-model="form.title" name="title" type="text" placeholder="Write an title"></label>
                           <label class="block text-lg  py-2 my-2 text-white" for="category">
                               Category
                               <select class="block w-full text-mblack" name="category"  v-model="form.category" id="category" value="Select" placeholder="Categories">
                                   <option>Linux</option>
                                   <option>CSS</option>
                                   <option>PHP</option>
                                   <option>Javascript</option>
                               </select>
                           </label>
                       </div>
                       <label class="block text-lg py-2 my-2 text-white" for="image">Upload Cover</label>
                       <input class="col-span-2" id="image_file" type="file" @input="form.image = $event.target.files[0]" />
                       <label class="block text-lg py-2 my-2 text-morange border-b-2 border-morange" for="content">Write Post using Markdown </label>
                       <div class="grid grid-cols-2 gap-2">
                       <textarea  v-model="form.content" class="w-full py-4" name="content" id="mdeditor" cols="30"
                               rows="20"></textarea>
                           <div class="text-black p-4 bg-white" v-html="compiledMarkdown"></div>
                       </div>

                       <button class="block w-32 py-2 px-4 my-4 uppercase bg-morange text-white" type="submit">Submit</button>
                   </form>
               </div>
            </div>
            <div class="w-full  my-4 justify-center mx-auto flex-wrap">
                <div class="text-white w-full box-shadow-st bg-mgrey">
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
                <div class="overflow-y-scroll my-4 bg-mgrey box-shadow-st text-white w-full bg-mgrey">
                    <p class="Varela p-2 bg-morange">Pick images by clicking on it</p>
                    <div class="flex my-2 flex-wrap h-60 ">
                        <div v-for="media in medias" :key="media" class="w-20 h-20 m-4 border-2 border-white">
                            <img class="cursor-pointer" @click="path" :src="`/storage/${media.id}/${media?.file_name}`" ref="image">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</template>

<style scoped>

.box-shadow-st {
  box-shadow: 0px 0px 3px black;
}

</style>


<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
import NavLink from '@/Components/NavLink';
import {useForm, usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import marked from 'marked'
export default {
    name: 'createArticle',
    layout: Main,
    components: {
        Logo,
        NavLink
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
        }
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
        const form = useForm({
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
