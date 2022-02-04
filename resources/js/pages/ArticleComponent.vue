<template>
  <div class="container">
    <h1>Articles</h1>

    <div class="row justify-content-center">

      <div class="card text-left m-2 col-3" v-for="article in articles" :key="article.id">

        <img class="card-img-top w-50" :src="'storage/' + article.image" alt=""/>

        <div class="card-body">
          <h4 class="card-title">{{ article.title }}</h4>
        </div>

        <small>
          <router-link :to="'/posts/' + article.id">View article</router-link>
        </small>
      </div>
    </div>

    <div class="links text-center mt-5">
      <span class="btn text-secondary" @click="PrevPage()" >Prev</span>
      <span class="btn" :class="meta.current_page === page ? 'btn-primary' : 'btn-light'" v-for="page in meta.last_page" :key="page" @click="ToPage(page)">{{page}}</span>
      <span class="btn text-secondary"  @click="NextPage()">Next</span>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  data() {
    return {
      articles: {},
      meta: {},
      links: {},
    };
  },

  methods: {
    GetPosts(url) {
      Axios.get(url)
        .then((response) => {
          // console.log(response);
          this.articles = response.data.data;
          this.meta = response.data.meta;
          this.links = response.data.links;
        })
        .catch((error) => error);

      console.log("Component mounted.");
    },

    NextPage(){
      if (this.meta.current_page !== this.meta.last_page) {
        this.GetPosts(this.links.next)
      }
    },

    PrevPage(){
      if (this.meta.current_page !== 1) {
        this.GetPosts(this.links.prev)
      }
    },

    ToPage(page){
      this.GetPosts('/api/posts?page=' + page)
    }
  },

  mounted() {
    this.GetPosts("/api/posts");
  },
};
</script>
