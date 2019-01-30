<template>
	<div class="YoutubeDash_wrapper">
		<finder></finder>
		<div v-if="!loading">
		<video-group :videos='videos'></video-group>
		</div>
		<div v-if="loading">
			loading ............
        </div>
	</div>
</template>

<script>
	import VideoGroup from './VideoGroup.vue';
	import Search from './Search.js';
	import Finder from './Finder.vue';
	export default {
	components :{
		VideoGroup , 
		Finder
	},

  created(){
  	Search({
  		apiKey : 'AIzaSyCpNLDOeE_Kj1_gAzUbxuleWNXpkgVYjfM',
  		term :'zamalek' ,
  		items: 10
  	},response => this.handelSearchResults(response));
  	
  	window.eventBus.$on('searchForYoutubeStarted' ,()=>{
  		this.loading = true ; 
  	});
  	 window.eventBus.$on('searchResultFromYoutube' , videos =>{
  	 	console.log('search result' ,videos);
  	 	  		this.loading = false ; 
  	 	  		this.videos = videos ;
  	 });
  },
  data(){
 	return {
 		videos : null,
 		loading : true
 	}
 },
 methods :{
 	handelSearchResults(result){
 		this.loading = false ; 
 		this.videos = result; 
 	}
 }
}
</script>

<style lang="css" scoped>
</style>