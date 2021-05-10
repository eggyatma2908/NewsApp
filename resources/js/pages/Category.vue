.<template>
    <div>
        <Header />
            <!-- Jumbotron Start -->
            <div class="jumbotron jumbotron-fluid" style="padding: 0; margin: 0; position: relative; background: linear-gradient(112.58deg, #FFFFFF 18.15%, rgba(255, 255, 255, 0) 53.07%), rgba(0, 0, 0, 0.1); height: 616px;">
                <img src="assets/images/cover3.png" alt="cover-2" style="position: absolute; z-index: -1; top: 1px; width: 100%; height: max-content">
                <div class="container" style="position: absolute; left: 10%; top: 30%">
                    <h1 class="display-4">Choose Article by Category</h1>
                    <p class="lead">Category helps you to read another article that you haven’t thought before. You able to read all articles for free. Enjoy the reading!</p>
                </div>
            </div>
            <!-- Jumbotron End -->

            <!-- Category Start -->
            <div class="container mt-5">
                <div class="box-filter-category">
                    <div class="sort">
                        <img src="assets/images/filter.png" alt="sort-icon">
                        <h6>Sort by<b>Last Added</b></h6>
                    </div>
                    <p>18 Category</p>
                </div>
                <p class="text1 mt-4 mb-5">Click the category to explort article</p>

                <div class="container d-flex justify-content-between">
                    <div class="box-14" v-if="categoryPolitics().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categoryPolitics().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categoryPolitics()[0].images" alt="images-category">
                        <p class="category mt-4">{{categoryPolitics()[0].category}}</p>
                    </div>

                    <div class="box-14" v-if="categorySport().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categorySport().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categorySport()[0].images" alt="images-category">
                        <p class="category mt-4">{{categorySport()[0].category}}</p>
                    </div>

                    <div class="box-14" v-if="categoryEconomy().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categoryEconomy().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categoryEconomy()[0].images" alt="images-category">
                        <p class="category mt-4">{{categoryEconomy()[0].category}}</p>
                    </div>

                    <div class="box-14" v-if="categoryCountry().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categoryCountry().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categoryCountry()[0].images" alt="images-category">
                        <p class="category mt-4">{{categoryCountry()[0].category}}</p>
                    </div>

                    <div class="box-14" v-if="categoryHealth().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categoryHealth().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categoryHealth()[0].images" alt="images-category">
                        <p class="category mt-4">{{categoryHealth()[0].category}}</p>
                    </div>

                    <div class="box-14" v-if="categoryBeauty().length > 0">
                        <div class="bg-shadow">
                            <p>+{{categoryBeauty().length}} Articles</p>
                        </div>
                        <img :src="'/images/' + categoryBeauty()[0].images" alt="images-category">
                        <p class="category mt-4">{{categoryBeauty()[0].category}}</p>
                    </div>
                </div>

                <h6 style="margin: 100px 0">We have no category left</h6>
            </div>
            <!-- Category End -->
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'Category',
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
.box-filter-category {
    display: flex;
    justify-content: space-between;
}
.sort {
    display: flex;
    width: 23%;
    justify-content: space-between;
    align-items: center;
}
.sort h6 {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -0.02em;
    color: #0D253C;
    margin: 0;
    height: max-content;
}
.box-filter-category p {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -0.02em;
    color: #CDCDCD;
}
.text1 {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 27px;
    letter-spacing: -0.02em;
    text-align: center;
    color: #CDCDCD;
}
.box-14 {
    width: 165px;
    height: 215px;
    position: relative;
}
.bg-shadow {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(13, 37, 60, 0.4);
    border-radius: 16px;
}
.bg-shadow p {
    width: 50%;
    margin: 0;
    top: 83px;
    left: 25%;
    position: absolute;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #FFFFFF;
    text-align: center;
}
.box-14 img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 16px;
}
.category {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 27px;
    color: #0D253C;
    text-align: center;
}
</style>