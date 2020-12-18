<template>
    <div class="container flex flex-col lg:flex-row">
        <div class="w-full lg:w-4/12">
            <the-navigation/>
        </div>
        <div class="w-full lg:w-8/12">
            <div class="ml-0 lg:ml-8 mt-8 lg:mt-0 ">


                <div class="flex justify-between mb-8 items-center">

                    <router-link class="bg-blue-400 rounded-lg p-2 text-white font-bold bg-blue-500"
                                 :to="{name: 'addTeam'}">Add Team
                    </router-link>
                </div>
                <div v-for="(team,index) in this.$store.state.teams" :key="index">
                    <ul>
                        <li class="mb-4 border border-gray-400 border-2 p-2 rounded-lg flex justify-between items-center">
                            <div class="flex flex-col w-full items-center">

                                <p class="px-4 w-full py-2 font-bold text-black">
                                    {{team.name}}
                                </p>

                            </div>
                            <div class="flex">
                                <a class="block p-3 bg-blue-500 hover:bg-blue-400 rounded-lg mr-2 order-1 lg:order-3"
                                   @click.prevent="showDeleteModal(index)"
                                   title="delete">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         class="fill-current text-white w-6 h-6">
                                        <path
                                            d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </a>

                                <a class="block p-3 bg-blue-500 hover:bg-blue-400 rounded-lg mr-2 order-1 lg:order-3"
                                   @click.prevent="goForEdit(index)"
                                   title="edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         class="fill-current text-white w-6 h-6">
                                        <path
                                            d="M6.3 12.3l10-10a1 1 0 0 1 1.4 0l4 4a1 1 0 0 1 0 1.4l-10 10a1 1 0 0 1-.7.3H7a1 1 0 0 1-1-1v-4a1 1 0 0 1 .3-.7zM8 16h2.59l9-9L17 4.41l-9 9V16zm10-2a1 1 0 0 1 2 0v6a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6c0-1.1.9-2 2-2h6a1 1 0 0 1 0 2H4v14h14v-6z"/>
                                    </svg>

                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <delete-component v-if="showDelete"
                          :the-name="deleteDialogName"
                          :the-message="deleteDialoMessage"
                          @confirmDelete="handleDelete"
                          @cancelModal="cancelDeleteModal"/>

    </div>
</template>


<script>
    import TheNavigation from "../components/TheNavigation";
    import DeleteComponent from "../components/DeleteComponent";

    export default {
        name: "TeamsPage.vue",
        components: {TheNavigation, DeleteComponent},
        data() {
            return {
                deleteDialogName: "Team",
                deleteDialoMessage: "All the players related to this team will be deleted !",
                deleteIndex: null,
                showDelete: false,
            }
        },
        methods: {
            changeSportFilter(item) {
                this.SportFilter = item;
            },
            findTeamIdByName(teamName) {
                return this.$store.state.teams.filter(teamItem => {
                    if (teamItem.name === teamName) {
                        return teamItem
                    }
                })
            }, showDeleteModal(index) {
                this.deleteIndex = index;
                this.showDelete = true;
            },
            async handleDelete() {
                let response = await axios.delete("/api/teams/" + this.$store.state.teams[this.deleteIndex].id);
                if (response.status === 200) {
                    this.cancelDeleteModal();
                    await this.$store.dispatch('fetchTeamsData');
                    await this.$store.dispatch('fetchPlayersData');
                }
            },
            cancelDeleteModal() {
                this.showDelete = false;
                this.deleteIndex = null;
            }, goForEdit(index) {
                let the_team = this.$store.state.teams[index];
                console.log(the_team.id);
                console.log(the_team.name);
                this.$router.push({
                    name: 'editTeam',
                    params: {
                        id: the_team.id,
                        isUpdate: true,
                        propId: the_team.id,
                        propName: the_team.name,
                    }
                })
            }
        },
        watch: {
            defaultFilterSelected: {
                handler: async function () {
                    console.log('changed');
                    if (this.$store.state.teams.length > 0) {
                        this.getPlayers();
                    }
                }
            }
        },
        mounted() {
            this.$store.dispatch('fetchTeamsData', this.form);
        }
    }
</script>

<style scoped>

</style>
