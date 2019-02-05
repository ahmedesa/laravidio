<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <textarea name="comment" class="form-control" v-model="comm" placeholder="Add a new comment">
                </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" @click="saveNewComment">Save</button>
                <i v-if="loading" class="fa fa-spinner fa-spin" style="font-size:24px"></i>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {

    name: 'CommentAdd',
    data() {
        return {
            comm: null,
            loading: false
        }
    },
    methods: {
        saveNewComment() {
            this.loading = true;
            var url = window.Laravel.basePath + '/api/comment';
            var postData = {
                body: this.comm,
                video_id: this.$route.params.id
            }
            axios.post(url, postData).then(response => {
                window.eventBus.$emit('CommentAddEvent', response.data);
                this.comm = '';
                this.loading = false;
            });

        }
    }
}

</script>
<style lang="css" scoped>
</style>
