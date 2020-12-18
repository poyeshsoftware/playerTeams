<template>
    <div class="container flex flex-col lg:flex-row">
        <div class="w-full lg:w-4/12">
            <the-navigation/>
        </div>
        <div class="w-full lg:w-8/12">
            <div class="ml-0 lg:ml-8 mt-8 lg:mt-0 ">
                <go-back/>
            </div>

            <div class="ml-0 lg:ml-8 mt-8 bg-white rounded-lg p-8  shadow-xl flex flex-col">

                <div class="flex flex-col mt-4 space-y-2">
                    <input v-model="name" class="border-2 border-gray-400 rounded px-3 py-2 mt-1 block w-full" placeholder="Team Name">
                </div>

                <button
                    class="mt-8 bg-gray-500 p-2 font-bold text-gray-300 rounded"
                    :class="{'bg-green-500 text-white cursor-pointer' : canSendForm}"
                    :disabled="!(canSendForm)"
                    @click.prevent="sendRequest"
                >
                    {{ isUpdate ? "Update Team" : "Create New Team" }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import TheNavigation from "../components/TheNavigation";
    import GoBack from "../components/GoBack";


    export default {
        name: "AddTeamPage",
        components: {TheNavigation, GoBack},
        props: ['isUpdate', 'propId', 'propName'],
        data() {
            return {
                name: this.propName,
            }
        },
        computed: {
            canSendForm() {
                return (
                    this.name
                );
            },
        },
        methods: {
            sendRequest() {
                if (this.canSendForm) {
                    if (this.isUpdate) {
                        this.SendUpdateRequest()
                    } else {
                        this.SendCreateRequest()
                    }
                }
            },
            async SendCreateRequest() {
                const response = await axios.post('/api/teams', {
                    name: this.name
                });

                if (response.status === 201) {
                    await this.$store.dispatch('fetchTeamsData');
                    this.$router.push({name: 'teams'});
                }
            },
            async SendUpdateRequest() {
                const response = await axios.patch('/api/teams/' + this.propId, {
                    name: this.name
                });

                if (response.status === 200) {
                    await this.$store.dispatch('fetchTeamsData');
                    this.$router.push({name: 'teams'});
                }
            },
        },
        mounted() {
            this.$store.dispatch('fetchTeamsData');
        }
    }
</script>

