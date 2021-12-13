import {createStore} from 'vuex'

export default createStore({
  state: {
    posts:[],
    currentPostId: null
  },
  getters: {
    getSinglePostById: (state) =>(id) =>{
      return state.posts.find(p => Number(p.id) === Number(id));
    },
    getCurrentPostId:(state)=>{
      return state.currentPostId
    }
  },
  mutations: {
    posts(state,payload){
      state.posts = payload
    },
    currentPostId(state,payload){
      state.currentPostId = payload
    }
  },
  actions: {
  },
  modules: {
  }
})
