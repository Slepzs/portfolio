<template>
    <div class="xl:container container p-6 grid grid">
        <div class="flex w-full grid">
            <div class="header m-5 grid grid-custom-cols">
                <div class="block my-2">
                    <inertia-link href="/">
                        <Logo :width="50" />
                    </inertia-link>
                </div>
                    <div class="block my-2">
                        <div class="my-2">
                            <div class="items-center bg-white leading-none text-purple-600 rounded-lg p-2 shadow text-teal text-sm">
                                <form class="flex" v-if="$page.props.auth.user" method="post" @submit.prevent="submit" enctype="multipart/form-data">
                                    <input class="col-span-2" style="display: none;" id="image_file" type="file" @input="form.image = $event.target.files[0]" />
                                    <input placeholder="Say something.." id="feed" type="text" v-model="form.description" name="description" class="block col-span-2 box-border rounded-lg my-2 w-full ">
                                    <img onclick="document.getElementById('image_file').click()" width="50" class="col-span-1" src="/img/save.svg" alt="">
                                </form>
                            </div>
                        </div>
                    </div>

                <div class="block my-2 ">
                    <img style="width: 100px" class="rounded-full mx-auto" src="/img/Tobias.png" alt="">
                </div>


            </div>
           <div class="flex w-full grid grid-custom-cols">
               <div class="block my-2">
                   <div class="justify-center align-center">
                       <div class="bg-white bg-myorange bg-opacity-75 border-1 border-myblack  text-white p-2 my-2 rounded-lg ">
                           <p>
                               Welcommen to my portfolio
                           </p>
                           <ul>
                               <a href="">My github</a>
                           </ul>
                       </div>
                   </div>
               </div>
               <div class="block my-2">
                   <Feed :feed="feed" />
               </div>
               <div class="block my-2">
                   <div v-for="i in 2" :key="i" class="block bg-white p-2 m-2 rounded-lg">Test</div>
               </div>
           </div>
        </div>
    </div>
</template>

<style scoped>
    .grid-custom-cols {
        grid-template-columns: 25% 50% 25%;
    }
    .grid-80-20 {
        grid-template-columns: 80% 20%;
    }

</style>

<script>

    import Main from '@/Layouts/Main';
    import Logo from '@/Components/ApplicationLogo';
    import Feed from '@/Components/Feed';
    import { useForm } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    import { usePage } from '@inertiajs/inertia-vue3'


    export default {
        layout: Main,
        props: {
          feed: Object,
          auth: Object,
        },
        data() {
          return {
              form: {
                  user_id: null,
                  description: null,
                  image: null
              }
          }
        },
        components: {
            Logo,
            Feed
        },
        methods: {
            onEnter() {
               const feedField = document.getElementById('feed');
               feedField.addEventListener('Keypress', function(e) {
                   if (e.key === 'Enter') {
                       return this.setup();
                   }
               })
            }
        },
        setup () {
            const user = usePage().props.value.auth.user.id;
            const form = useForm({
                user_id: user,
                description: null,
                image: null,
            })
            function submit() {
                Inertia.post('/feed/', form, {
                    _method: 'put',
                    forceFormData: true,
                    onSuccess: () => form.reset()
                })
            }
            return { form, submit }
        },
    }
</script>
