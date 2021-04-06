<template>
    <div class="xl:container container p-6 grid grid">
        <div class="flex w-full grid grid-cols-3">
            <div class="block my-2">
                <div class="justify-center align-center text-center">
                    <inertia-link href="/">
                        <Logo :width="75" />Tobias Heide
                    </inertia-link>
                </div>
            </div>
            <div class="block my-2">
                    <div class="my-2">
                        <div class="block items-center bg-white leading-none text-purple-600 m-2 rounded-lg p-2 shadow text-teal text-sm">
                            <span class="block bg-indigo-600 text-white py-3 text-center my-2 rounded-lg justify-center items-center">Write something</span>
                            <form method="post" @submit.prevent="submit">
                                <input id="feed" type="text" v-model="form.description" name="description" class="block box-border rounded-lg my-2 w-full ">
                            </form>
                        </div>
                    </div>
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
    import { useForm } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        layout: Main,
        data() {
          return {
              form: {
                  description: null,
                  image: null
              }
          }
        },
        components: {
            Logo,
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
            const form = useForm({
                description: null,
                image: 'test',
            })
            function submit() {
                Inertia.post('/feed/', form)
            }
            return { form, submit }
        },
    }
</script>
