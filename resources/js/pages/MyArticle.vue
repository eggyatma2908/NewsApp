<template>
    <div>
        <Header />
            <!-- My Article Start -->
            <div class="container mt-5" id="read-article">
                <div class="box-13">
                    <router-link to='/'><img src="/assets/images/back1.png" alt="back-icon">Back</router-link>
                </div>
                <h1>My Article</h1>
            </div>

            <div class="container">
                <div class="box-12 mt-5">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="article in articles" :key="article.id">
                        <router-link :to="{ path: `read-article/${article.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + article.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{article.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{article.description}}</p>
                                        <div class="box-like-time">
                                            <div class="box-like">
                                                <img src="assets/images/like.png" alt="gallery-1.2">
                                                <p>2.1k</p>
                                            </div>
                                            <div class="box-time">
                                                <img src="assets/images/time.png" style="width: 20px;" alt="gallery-1.3">
                                                <p>3m ago</p>
                                            </div>
                                            <img src="assets/images/tape.png" style="width: 11px; height:16px; align-self: center" alt="gallery-1.4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <div>
                            <router-link :to="{ path: `edit-article/${article.id}`}"><button class="edit">Edit</button></router-link>
                            <button class="delete" @click="deleted(article.id)">X</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- My Article End -->
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'MyArticle',
    components: {
        Header,
        Footer
    },
    data () {
        return {
            articles: []
        }
    },
    mounted () {
        axios.get('api/articles', {headers: { 'Authorization' : 'Bearer '+ this.token}})
        .then ((response) => {
            this.articles = response.data
        })
    },
    methods: {
        deleted(id) {
            axios.delete('api/articles/' + id, {headers: { 'Authorization' : 'Bearer '+ this.token}})
            .then((response) => {
                this.$noty.success(response.data.message)
                this.$router.push({ name: 'Home'})
            })
        }
    }
}
</script>

<style>
.edit {
    position: absolute;
    bottom: 0;
    left: 0;
    border-radius: 12px;
    background: black;
    border: none;
    color: white;
    font-weight: 800;
}
.delete {
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 100%;
    background: black;
    border: none;
    color: white;
    font-weight: 800;
}
</style>