<template>
	<div class="VideoGroup_wrapper grid row ">
		  <video-item 
		  v-images-loaded:on.progress="imageProgress"
		  v-for="video in videos" 
		  :key='video.id.videoId'
		  :video="video"
		  >
		  
		  </video-item>
	</div>
</template>

<script>
	import VideoItem    from './VideoItem.vue';
	import imagesLoaded from 'vue-images-loaded';
	import Isotope      from 'isotope-layout';

export default {

  name: 'VideoGroup',
  props :['videos'],
  components :{
  	VideoItem
  },
  created(){
  	this.relayoutTheGrid();
  },
  directives: {
        imagesLoaded
  },
  data(){
  	return{
  		isotope : null ,
  		counter : 0
  	}
  }, 
  methods : {
  		relayoutTheGrid(){
  			setTimeout(() => {
            var elem = document.querySelector('.grid');
  			this.isotope = new Isotope(elem , {
  			itemSelector : '.card' , 
  			layoutMode :'masonry'
  			});
  		},1);
  			
  		} ,
  		imageProgress(instance, image ) {
        const result = image.isLoaded ? 'loaded' : 'broken';
        console.log( 'image is ' + result + ' for ' + image.img.src );
        this.counter++;
          if (this.counter == this.videos.length) {
          this.relayoutTheGrid();
        }
    }
  	}
}
</script>

<style lang="css" scoped>
</style>