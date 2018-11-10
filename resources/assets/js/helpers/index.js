export const setHTTPToken = (token) => {
    window.axios.defaults.headers.common["Authorization"] = "Bearer " + token
};

export const removeHTTPToken = () => {
    window.axios.defaults.headers.common["Authorization"] = null;
};