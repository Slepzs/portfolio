<template>
    <div class="xl:container container p-6 grid grid">
        <div class="flex w-full grid grid-cols-3">
            <div class="block my-2">
                <div class="justify-center align-center text-center">
                    <inertia-link href="/">
                        <Logo :width="75" />
                    </inertia-link>
                </div>
            </div>
            <div class="block my-2">
                    <div class="my-2">
                        <div class="block items-center bg-white leading-none text-purple-600 m-2 rounded-lg p-2 shadow text-teal text-sm">
                            <span class="block bg-indigo-600 text-white py-3 text-center my-2 rounded-lg justify-center items-center">Write something</span>
                            <form v-if="$page.props.auth.user" method="post" @submit.prevent="submit" enctype="multipart/form-data">
                                <input type="file" @input="form.image = $event.target.files[0]" />
                                <input id="feed" type="text" v-model="form.description" name="description" class="block box-border rounded-lg my-2 w-full ">
                            </form>
                        </div>
                    </div>

                    <Feed :feed="feed" />


            </div>
            <div class="block my-2">
                <div v-for="i in 10" :key="i" class="block bg-white p-6 m-6 rounded-lg">Test</div>
            </div>
        </div>
    </div>
</template>

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
