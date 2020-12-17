
// = mutations - update data
export default {
    SET_AUTHENTICATED(state, value) {
        state.authenticated = value
    },

    SET_USER(state, value) {
        state.user = value
    },

    SET_TEAMS(state, teams) {
        state.teams = teams
    },

    SET_PLAYERS(state, players) {
        state.players = players
    },
}
