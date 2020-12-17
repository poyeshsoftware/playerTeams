export default { // = computed properties
    authenticated(state) {
        return state.authenticated
    },

    user(state) {
        return state.user
    },
    teamsForFilteringNames(state) {
        var teams = state.teams.map(teamItem => {
            return teamItem.name
        });
        teams.unshift('All Teams');
        return teams;
    },
    teamsNames(state) {
        return state.teams.map(teamItem => {
            return teamItem.name
        });
    },
}
