export default { // = methods
    async signIn({dispatch}, credentials) {
        await axios.get('/sanctum/csrf-cookie');
        await axios.post('/login', credentials);

        return dispatch('me')
    },

    async signOut({dispatch}) {
        await axios.post('/logout');

        return dispatch('me')
    },

    me({commit}) {
        return axios.get('/api/user')
            .then((response) => {
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            })
            .catch(() => {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            })
    },
    fetchTeamsData({commit, dispatch}) {
        return new Promise((resolve, reject) => {
            axios.get("/api/teams")
                .then((response) => {
                    commit('SET_TEAMS', Object.assign(response.data.data));
                    resolve(response)
                })
                .catch((error) => {
                    console.log(error);
                    reject(error)
                })
        })
    },
    fetchPlayersData({commit, dispatch}) {
        return new Promise((resolve, reject) => {
            axios.get("/api/players")
                .then((response) => {
                    commit('SET_PLAYERS', Object.assign(response.data.data));
                    resolve(response)
                })
                .catch((error) => {
                    console.log(error);
                    reject(error)
                })
        })
    },

}
