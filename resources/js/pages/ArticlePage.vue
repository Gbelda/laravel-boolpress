<template>
  <div>
    <img :src="'/storage/' + post.image" alt />
    <div class="card-body">
      <h3>{{ post.title }} hello</h3>
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
  methods:{
    GetPost(){
      Axios.get("/api/posts/" + this.$route.params.id).then(resp => {
        // console.log(resp.data.data);
        this.post = resp.data.data;
      });
    }
  },
  mounted() {
    this.GetPost();
  },
};
</script>

<style>
</style>