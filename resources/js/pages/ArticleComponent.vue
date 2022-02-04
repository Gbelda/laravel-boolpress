<template>
  <div class="container">
    <h1>Articles</h1>

    <div class="row">
      <div class="card text-left mb-2" v-for="article in articles" :key="article.id">
        <img class="card-img-top w-25" :src="'storage/' + article.image" alt="" />
        <div class="card-body">
          <h4 class="card-title">{{ article.title }}</h4>
          <p class="card-text">{{ article.content }}</p>
        </div>
        <small>
          <router-link :to="'/posts/' + article.id">View article</router-link>
        </small>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
    data() {
        return{
            articles : null
        }
    },

    methods:{
      GetPosts(){
            Axios.get("/api/posts")
      .then((response) => {
        // console.log(response);
        this.articles = response.data.data;
      })
      .catch((error) => error);

    console.log("Component mounted.");
      }
    },

    mounted() {

      this.GetPosts();

    },
};
</script>
