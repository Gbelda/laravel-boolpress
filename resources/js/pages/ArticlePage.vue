<template>
  <div>
    <!-- <img :src="'/storage/' + post.image" alt /> -->
    <div class="card-body">
      <!-- <h3>{{ post.title }}</h3> -->
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      post: {},
    };
  },
  mounted() {
    Axios.get("api/posts/" + this.$route.params.id).then(resp => {
      console.log(resp);
      this.post = resp.data.data;
    });
  },
};
</script>

<style>
</style>