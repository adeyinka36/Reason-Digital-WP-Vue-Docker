<template>
  <div class="main-single">
    <div class="right">
      <h1>{{post.title.rendered}}</h1>
      <p id="content"><span v-html="post.content.rendered"></span></p>
    </div>
    <div class="left">
      <img :src="post.images.large"/>
    </div>
  </div>
</template>

<script>
export default {
  name: 'About',
  data:()=>{
    return {
      post: {}
    }
  },
  beforeMount() {
    if(this.$route.params.id){
      this.$store.commit('currentPostId', this.$route.params.id);
      this.post = this.$store.getters.getSinglePostById(this.$route.params.id);
      localStorage.setItem('post',JSON.stringify(this.post))
    } else {
      this.post = JSON.parse(localStorage.getItem('post'));
    }
  },
  mounted(){
    let para = document.getElementById('content').firstElementChild;
    for (let i = 0; i < para.children.length; i++) {
      para.children[i].style.marginBottom = "2rem";
    }
  }
}
</script>

<style scoped lang="scss">

.main-single{
  display: flex;
  height: 90vh;
  h1{
    margin-bottom: 1.5rem;
  }
  div{
    width: 50%;
    height: 90%;
    margin-top: 6rem;
  }
  img{
    max-width: 100%;
  }
  .right{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    padding-right: 2rem;
    p{
      margin-bottom: 2.5rem;
      color: black;
      opacity: 1;
    }
  }
  .right *{
    width: 100%;
    text-align: left;
  }
  .left{
    display: flex;
    align-items: center;
    justify-content: center;
  }
}


.search li{
  transition: opacity .75s ease-out;
  border-bottom: 2px solid rgba(0,0,0,0);
  &:hover{
    border-bottom: 2px solid rgba(0,0,0,1);
    cursor: pointer;
  }
}
/* a bit of media queries for single post page */
@media (max-width: 1150px) {
  .main-single {
    flex-direction: column;
  }
  .main-single div {
    width: 100%;
  }
  .main-single .right p {
    padding-top: 1rem;
  }
}
</style>
