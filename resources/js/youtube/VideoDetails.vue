<template>
  <div class="VideoDetails__wrapper">
    <!--Main wrapper-->
    <div class="row" v-if="video">
      <div class="col-sm-8">
        <h2>{{video.snippet.title}}</h2>
        <small>Channel: {{video.snippet.channelTitle}}</small>

        <div class="embed-responsive embed-responsive-16by9 mb-3">
          <iframe v-bind:src="url"></iframe>
        </div>

        <p>{{video.snippet.description}}</p>

      </div>

    </div>


  </div>
</template>

<script>
export default {

  name: 'VideoDetails',

  data () {
    return {
    	videoId : null ,
    	video   : null ,
    	url     : null
    }
  },
  created(){
  	if (this.$route.params.video === undefined) {
  		this.$router.push({name :'youtube-dash'});
  	}
  	this.videoId = this.$route.params.id ;
  	this.video   = this.$route.params.video ;
  	this.url = `https://www.youtube.com/embed/${this.videoId}`;



}
}
</script>

<style lang="css" scoped>
</style>