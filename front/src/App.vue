<template>
  <Header/>
  <router-view/>
</template>


<script>
import Header from './components/Header';
export default{
  components:{
    Header
  },
  created() {
    console.log('hello')
  }
}
</script>