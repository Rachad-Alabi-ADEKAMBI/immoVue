import { createStore } from 'vuex'

const store = createStore({
    state:{
        appName: "Vue3  Vuex"
    },
    getters:{
        appName (state){
            return state.appName
        }
    }
})

export default store