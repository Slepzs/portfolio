<template>



    <div class="container py-2">

        <h1 class="text-white w-full block text-6xl my-12 text-center">Create Article</h1>

        <div class="flex w-2/4 p-12 border-4 my-4 border-myorange rounded-2xl justify-center mx-auto flex-wrap">
            <form @submit.prevent="submit">

                <div class="grid gap-2 grid-cols-2">
                    <label class="block text-lg  py-2 my-2 text-white" for="title">Title<input class="block" name="title" type="text"></label>
                    <label class="block text-lg  py-2 my-2 text-white" for="category">
                        Category
                        <select class="block w-full text-myblack" name="category" id="category">
                            <option value="Linux">Linux</option>
                            <option value="Linux">CSS</option>
                            <option value="Linux">PHP</option>
                            <option value="Linux">Javascript</option>
                        </select>
                    </label>
                </div>
                <label class="block text-lg py-2 my-2 text-white" for="content">Content </label>
                <textarea class="w-full py-4" name="content" id="" cols="30"
                          rows="10"></textarea>

            <button class="block w-full py-2 px-4 bg-myblack text-myorange" type="submit">Submit</button>
            </form>
        </div>
    </div>


</template>




<script>
import Logo from '@/Components/ApplicationLogo';
import Main from '@/Layouts/Main';
import NavLink from '@/Components/NavLink';
export default {
    layout: Main,
    components: {
        Logo,
        NavLink
    },
}
</script>
