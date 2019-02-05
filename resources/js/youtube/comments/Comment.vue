<template>
  <div class="card pb-1">
    <div class="card-body">
      <small class="text-muted"> {{comment.created_at}}</small>
      <br>
      {{comment.body}}
    </div>
  </div>
</template>

<script>
export default {

  name: 'Comment',
  props:['comment']

}
</script>

<style lang="css" scoped>
</style>