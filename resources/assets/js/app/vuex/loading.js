const state = {
    isLoading: false,
    isFetchLoading: false
};

const getters = {
    isLoading: (state) => { return state.isLoading },
    isNotLoading: (state) => { return ! state.isLoading },
    isFetchLoading: (state) => { return state.isFetchLoading }
};

const mutations = {
    setIsLoading(state, isLoading) { state.isLoading = isLoading },
    setIsFetchLoading(state, isLoading) { state.isFetchLoading = isLoading }
};

export default
{
    namespaced: true,
    state,
    mutations,
    getters
}