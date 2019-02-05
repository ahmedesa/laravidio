<template>
  <div class="VideoDetails__wrapper">
    <div class="row" v-if="video">
      <div class="col-sm-8">
        <h2>{{video.snippet.title}}</h2>
        <small>Channel: {{video.snippet.channelTitle}}</small>

        <div class="embed-responsive embed-responsive-16by9 mb-3">
          <iframe v-bind:src="url"></iframe>
        </div>


        <p>{{video.snippet.description}}</p>      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 pt-4">
        <comment-wrapper></comment-wrapper>
      </div>
    </div>
  </div>
</template>

<script>
  import CommentWrapper from './comments/CommentWrapper.vue';
  import GetVideo       from './GetVideo.js' ;

export default {

  name: 'VideoDetails',
  components :{
    CommentWrapper 
  },
  data () {
    return {
    	videoId : null ,
    	video   : null ,
    	url     : null
    }
  },
  created(){
  	this.videoId = this.$route.params.id ;
  	this.url = `https://www.youtube.com/embed/${this.videoId}`;
    GetVideo({
      apiKey : 'AIzaSyCpNLDOeE_Kj1_gAzUbxuleWNXpkgVYjfM',
      videoId: this.videoId
     },response => {
      this.video = response[0];
       });
    },

}
</script>

<style lang="css" scoped>
</style>