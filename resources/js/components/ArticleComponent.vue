<template>
  <div class="container">
    <div class="row">
      <div class="card text-left" v-for="article in articles" :key="article.id">
        <img class="card-img-top" src="" alt="" />
        <div class="card-body">
          <h4 class="card-title">{{ article.title }}</h4>
          <p class="card-text">{{ article.body }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    data() {
        return{
            articles : null
        }
    },
  mounted() {
    axios.get("api/articles")
      .then((response) => {
        console.log(response);
        this.articles = response.data;
      })
      .catch((error) => error);

    console.log("Component mounted.");
  },
};
</script>
