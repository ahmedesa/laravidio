<template>
	<div class="search_wrapper">
    <div class="container">
		<form  v-on:submit.prevent='handelFormSubmit'>
			<input v-model="searchString" type="text" class="form-control">
		</form>
    </div>
	</div>
</template>

<script>
import Search from './Search.js';
export default {

  name: 'Finder',

  data () {
    return {
    	searchString : ''
    }
  },
  methods :{
  	handelFormSubmit(){
  	 window.eventBus.$emit('searchForYoutubeStarted');
  	 Search({
  		apiKey : 'AIzaSyCpNLDOeE_Kj1_gAzUbxuleWNXpkgVYjfM',
  		term : this.searchString ,
  		items: 10
  	 },data => {
  		window.eventBus.$emit('searchResultFromYoutube' , data);
      this.searchString = "";
  	   });
  	}

  }
}
</script>

<style>
.search_wrapper{
     margin-bottom: 10px;
}
</style>