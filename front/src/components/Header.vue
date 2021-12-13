<template>
  <header class="header">
    <div class="icon-con">
      <i class="fab fa-adn logo"></i>
      <i class="fas fa-bars menu" @click="toggle"></i>
    </div>
    <ul class="drop-down">
      <li><router-link to="/">HOME</router-link></li>
      <li><router-link to="/">ABOUT</router-link></li>
      <li><router-link to="/">CONTACT</router-link></li>
      <li><router-link to="/">DONATE</router-link></li>
    </ul>
  </header>
</template>

<script>
export default{
  data:()=>{
    return{
      showDropDown : false
    }
  },
  methods:{
    toggle(){
      const dropDown = document.getElementsByClassName('drop-down')[0];
      if(!this.showDropDown){
        dropDown.style.top ="100%";
        dropDown.style.opacity = "1";
        this.showDropDown = true;
      }else {
        dropDown.style.top="-200%";
        dropDown.style.opacity = "0";
        this.showDropDown = false;
      }
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
header {
  display: flex;
  flex-direction: column;
  position: relative;
  .icon-con{
    width: 100%;
    display: flex;
    justify-content: space-between;
    height: 10vh;
    z-index: 200;
  }
  .menu, .logo{
    font-size: 4rem;
  }
  ul{
    position: absolute;
    background-color: white;
    display: flex;
    flex-direction: column;
    transition: opacity .25s ease-out, top 1s ease-out;
    width: 100%;
    top: -250%;
    z-index: 1;
    li{
      height: 3vh;
      text-align: center;
      font-size:.85rem;
      margin-bottom: 1rem;
    }
    a{
      font-size: 1.7rem;
      letter-spacing: .4rem;
      font-weight: bold;
      color: black;
      width: auto;
      margin-bottom: .2rem;
    }
  }
  .menu {
    &:hover {
      cursor: pointer;
      color: lightblue;
    }
  }
}
</style>
