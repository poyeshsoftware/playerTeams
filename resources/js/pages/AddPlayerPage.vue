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
                    <input v-model="name" class="border-2 border-gray-400 rounded px-3 py-2 mt-1 block w-full" placeholder="Player Name">
                </div>

                <div class="flex flex-col mt-4 space-y-2">
                    <label>Team :</label>

                    <select v-model="team" class="border-2 border-gray-400 rounded px-3 py-2 mt-1 block w-full ">
                        <option v-for="item in this.$store.state.teams">
                            {{item.name}}
                        </option>
                    </select>

                </div>

                <button
                    class =  "mt-8 bg-gray-500 p-2 font-bold text-gray-200 rounded"
                    :class="{'mt-8 bg-blue-500 p-2 font-bold text-gray-100 cursor-pointer rounded' : canSendForm}"
                    :disabled="!(canSendForm)"
                    @click.prevent="sendRequest"
                >
                    {{ isUpdate ? "Update Player" : "Create New Player" }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    import TheNavigation from "../components/TheNavigation";
    import GoBack from "../components/GoBack";


    export default {
        name: "AddPlayerPage",
        components: {TheNavigation, GoBack},
        props: ['isUpdate', 'propId', 'propName', 'propTeam'],
        data() {
            return {
                name: this.propName,
                team: this.propTeam
            }
        },
        computed: {
            canSendForm() {
                return (
                    this.name
                    &&
                    this.team
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
                let teamId = this.findTeamIdByName(this.team);

                const response = await axios.post('/api/players', {
                    name: this.name,
                    team_id : teamId[0].id
                });
                if (response.status === 201) {
                    await this.$store.dispatch('fetchPlayersData');
                    this.$router.push({name: 'dashboard'});
                }
            },
            async SendUpdateRequest() {
                // const response = await axios.patch('/api/teams/' + this.propId, {
                //     name: this.name,
                //     sports: this.sportIds,
                // });
                //
                // if (response.status === 200) {
                //     await this.$store.dispatch('fetchTeamsData');
                //     this.$router.push({name: 'teams'});
                // }
            },
            findTeamIdByName(TeamName) {
                return this.$store.state.teams.filter(teamItem => {
                    if (teamItem.name === TeamName) {
                        return teamItem
                    }
                })
            }

        },
        mounted() {
            this.$store.dispatch('fetchTeamsData');
        }
    }
</script>

