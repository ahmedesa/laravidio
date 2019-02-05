<template>
    <div id="comment_wrapper">
        <comment-add></comment-add>
        <div v-for="comment in comments" v-bind:key="comment.id">
            <comment :comment="comment"></comment>
        </div>
    </div>
</template>
<script>
import Comment from './Comment.vue';
import CommentAdd from './CommentAdd.vue';
import axios from 'axios';

export default {

    name: 'CommentWrapper',
    components: {
        Comment,
        CommentAdd
    },
    created() {
        this.loadComments();
        window.eventBus.$on('CommentAddEvent', comment => this.handelNewComment(comment));
    },
    data() {
        return {
            comments: []
        }
    },
    methods: {
        handelNewComment(comment) {
            this.comments.unshift(comment);
        },
        loadComments() {
            var url = window.Laravel.basePath + '/api/video/comments';
            var postData = {
                video_id: this.$route.params.id
            }
            axios.post(url, postData).then(response => {
                this.comments = response.data;
            });

        }
    }
}

</script>
<style lang="css" scoped>
</style>
