<template>
    <div class="flex justify-between mb-10">
        <ul class="flex items-center">
            <li class="mr-4" v-if="this.$store.state.authenticated">
                <img class="w-7 h-7 border bg-gray-200 border-gray-200 rounded rounded-full" src="/image/germany.png" />
            </li>

            <li class="mr-4" v-if="this.$store.state.authenticated">
                <router-link :to="{ name: 'dashboard' }" class="text-gray-800 font-bold">
                    Home
                </router-link>
            </li>
        </ul>
        <ul class="flex items-center">
            <template v-if="this.$store.state.authenticated">
                <li class="mr-8">
                    <span class="text-gray-800 font-light">
                       Welcome {{ this.$store.state.user.name }}
                    </span>
                </li>
                <li>
                    <a @click.prevent="signOut" href="#" class="text-gray-800 font-medium">
                        Sign out
                    </a>
                </li>
            </template>
            <template v-else>
                <li class="mr-4">
                    <router-link :to="{ name: 'index' }" class="text-gray-800 font-medium">
                        Sign in
                    </router-link>
                </li>
            </template>
        </ul>
    </div>
</template>

<script>


    export default {
        methods: {


            async signOut () {
                await await this.$store.dispatch('signOut');

                this.$router.replace({ name: 'index' })
            }
        }
    }
</script>
