<script setup>
import Navbar from './components/NavBar.vue'
import Footer from './components/Footer.vue'
// import Header from './components/Header.vue';
// import HeroSection from './sections/Hero-section.vue';
// import FeaturesSection from './sections/Features-section.vue'
// import FAQs from './sections/Faq-section.vue'
// import Contactsection from './sections/Contact-section.vue'
// import Topplayers from './sections/Topplayers-section.vue'
</script>

<template>
  <div>
    <!-- <Header></Header> -->
    <Navbar v-if="!$route.meta.hideHeaderFooter"></Navbar>
    <RouterView />
    <Footer v-if="!$route.meta.hideHeaderFooter"></Footer>


  </div>
</template>

<style scoped>

</style>
