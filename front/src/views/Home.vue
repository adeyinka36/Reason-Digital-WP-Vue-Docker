<template>
  <div class="description-search">
    <div class="description">
      <h2>Portfolio</h2>
      <p>This is a description of my word</p>
      <p>For more, checkout out my website</p>
    </div>
    <div class="search">
      <ul>
        <li>All</li>
        <li>Charities</li>
        <li>Assistance</li>
        <li>Donate</li>
      </ul>
    </div>
  </div>
  <main>
    <div v-for="(post, index) in posts" :key="index" class="post-con">
      <img :src="post.images.large" alt="image of the post"/>
      <p class="title" @click="showPost"> <router-link  :to="{name: 'About', params:{id:post.id}}"> {{(post.title).rendered}} </router-link></p>
    </div>
  </main>
</template>

<script>

import axios from "axios";

export default {
  name: 'Home',
  data:()=>{
    return{
      posts:[]
    }
  },
  beforeMount(){
    axios.get('http://localhost:5000/wp-json/wp/v2/posts')
        .then(({data})=> {
          console.log(data)
          localStorage.setItem('data',JSON.stringify(data))
          this.$store.commit('posts',data);
          this.posts =  data;
        })
  },
  methods:{
    showPost(e){
      console.log(e)
    }
  }
}
</script>

<style scoped lang="scss">
.description-search{
  display: flex;
  justify-content: space-between;
}
.description{
  width: 50%;
}
.search{
  margin-top: auto;
  width: 40%;
  li {
    transition: opacity .75s ease-out;
    border-bottom: 2px solid rgba(0, 0, 0, 0);
    &:hover{
      border-bottom: 2px solid rgba(0,0,0,1);
      cursor: pointer;
    }
  }
  ul{
    display:  flex;
    min-width: 50%;
    flex-direction: row;
    justify-content: space-between;
    font-size: .9rem;
    font-weight: bold;
  }
}

main{
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  .post-con {
    max-width: 31%;
    margin: .5rem 0 1.5rem;
  }
  .post-con img{
    width: 100%;
  }
}
.post-con{
  .title{
    font-size: .9rem;
    font-weight: bold;
  }
}
</style>