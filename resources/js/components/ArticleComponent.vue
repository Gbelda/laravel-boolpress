<template>
  <div class="container">
    <h1>Articles</h1>

    <div class="row">
      <div class="card text-left" v-for="article in articles" :key="article.id">
        <img class="card-img-top w-25" :src="'storage/' + article.image" alt="" />
        <div class="card-body">
          <h4 class="card-title">{{ article.title }}</h4>
          <p class="card-text">{{ article.content }}</p>
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
    axios.get("api/posts")
      .then((response) => {
        console.log(response);
        this.articles = response.data.data;
      })
      .catch((error) => error);

    console.log("Component mounted.");
  },
};
</script>
