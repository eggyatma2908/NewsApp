<template>
    <div>
        <Header />
        <!-- Jumbotron Start -->
            <div class="jumbotron jumbotron-fluid" style="padding: 0; margin: 0; position: relative; background: linear-gradient(112.58deg, #FFFFFF 18.15%, rgba(255, 255, 255, 0) 53.07%), rgba(0, 0, 0, 0.1); height: 616px;">
                <img src="assets/images/cover2.png" alt="cover-2" style="position: absolute; z-index: -1; top: 1px; width: 100%; height: max-content">
                <div class="container p-5">
                    <h1 class="display-4">Start Writing an Article</h1>
                    <p class="lead">You can be an author by being active in reading artciles in a month or you can request to be an author if you have been a member for three months.</p>
                    <br>
                    <router-link :to="{ name : 'WriteArticle' }"><button class="btn btn-primary">Start Writing</button></router-link>
                </div>
            </div>
            <!-- Jumbotron End -->

            <!-- Articles Start -->
            <div class="container mt-5">
                <div class="box-filter-article">
                    <img src="assets/images/filter.png" alt="sort-icon">
                    <h6>Filter Article : sort by<b>category</b></h6>
                </div>

                <h1 class="title1 mt-5 mb-3">{{politics}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="politic in categoryPolitics()" :key="politic.id">
                        <router-link :to="{ path: `read-article/${politic.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + politic.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{politic.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{politic.description}}</p>
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
                    </div>
                </div>

                <h1 class="title1 mt-5 mb-3">{{sport}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="sport in categorySport()" :key="sport.id">
                        <router-link :to="{ path: `read-article/${sport.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + sport.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{sport.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{sport.description}}</p>
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
                    </div>
                </div>

                <h1 class="title1 mt-5 mb-3">{{economy}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="economy in categoryEconomy()" :key="economy.id">
                        <router-link :to="{ path: `read-article/${economy.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + economy.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{economy.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{economy.description}}</p>
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
                    </div>
                </div>

                <h1 class="title1 mt-5 mb-3">{{health}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="health in categoryHealth()" :key="health.id">
                        <router-link :to="{ path: `read-article/${health.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + health.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{health.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{health.description}}</p>
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
                    </div>
                </div>

                <h1 class="title1 mt-5 mb-3">{{country}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="country in categoryCountry()" :key="country.id">
                        <router-link :to="{ path: `read-article/${country.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + country.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{country.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{country.description}}</p>
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
                    </div>
                </div>

                <h1 class="title1 mt-5 mb-3">{{beauty}}</h1>
                <div class="box-12">
                    <div class="card mb-3 mr-2 ml-2" style="width: 350px; border-radius: 25px" v-for="beauty in categoryBeauty()" :key="beauty.id">
                        <router-link :to="{ path: `read-article/${beauty.id}`}">
                            <div class="row no-gutters" style="width: 100%; height: 100%">
                                <div class="col-md-5 box-images">
                                    <img :src="'/images/' + beauty.images" alt="gallery-1.1">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-body">
                                        <h5 class="card-title">{{beauty.title}}</h5>
                                        <p class="card-text mt-3 mb-5">{{beauty.description}}</p>
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
                    </div>
                </div>

                <h6 class="load-category mt-5 mb-5">Load another 30+ category</h6>
            </div>
            <!-- Articles End -->
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'Article',
    components: {
        Header,
        Footer
    },
    data () {
        return {
            articles: [],
            politics: 'Politics',
            sport: 'Sport',
            economy: 'Economy',
            country: 'Country',
            health: 'Health',
            beauty: 'Beauty',
            token: localStorage.getItem('jwt')
        }
    },
    mounted () {
        axios.get('api/articles', {headers: { 'Authorization' : 'Bearer '+ this.token}})
        .then ((response) => {
            this.articles = response.data
        })
    },
    methods: {
        categoryPolitics () {
            return this.articles.filter((article) => {
                return article.category.match(this.politics)
            })
        },
        categorySport () {
            return this.articles.filter((article) => {
                return article.category.match(this.sport)
            })
        },
        categoryEconomy () {
            return this.articles.filter((article) => {
                return article.category.match(this.economy)
            })
        },
        categoryCountry () {
            return this.articles.filter((article) => {
                return article.category.match(this.country)
            })
        },
        categoryHealth () {
            return this.articles.filter((article) => {
                return article.category.match(this.health)
            })
        },
        categoryBeauty () {
            return this.articles.filter((article) => {
                return article.category.match(this.beauty)
            })
        },
    }
    
}
</script>

<style>
.box-filter-article {
    display: flex;
    width: 30%;
    justify-content: space-between;
}
.box-filter-article h6 {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -0.02em;
    color: #0D253C;
    margin: 0;
}
b {
    padding: 0 0 0 5px;
}
.title1 {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 33px;
    color: #0D253C;
}
.load-category {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 33px;
    color: #376AED;
}
</style>