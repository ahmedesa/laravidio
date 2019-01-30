<template>
	<div class="VideoItem_wrapper">
		<div class="card" style="width: 18rem;">
  <img class="card-img-top" v-bind:src="videoImage" v-bind:alt="videoTitle">
  <div class="card-body">
    <h5 class="card-title">{{videoTitle}}</h5>
    <p class="card-text">{{videoDiscreption}}</p>
        <router-link 
        :to="{name: 'youtube-video', params: {id: video.id.videoId,video : video} }" 
        class="btn btn-primary">
          Show video
        </router-link>

  </div>
</div>

	</div>
</template>

<script>
export default {
  props :['video'] ,
  computed :{
  	videoTitle(){
  		return this.video.snippet.title ;
  	},
  	videoDiscreption(){
  		return this.video.snippet.description ;
  	},
  	videoImage(){
  		return this.video.snippet.thumbnails.medium.url ;
  	}
  }
}
</script>

<style lang="css" scoped>

</style>