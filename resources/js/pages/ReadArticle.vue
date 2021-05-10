<template>
    <div>
        <Header />
            <!-- Read Article Start --> 
            <div class="container mt-5" id="read-article">
                <div class="box-13">
                    <router-link to='/'><img src="/assets/images/back1.png" alt="back-icon">Back</router-link>
                </div>
                <h1>Article Viewer</h1>
            </div>

            <div class="container mt-5 mb-5" style="width: 100%; height: 270px">
                <img class="img-article" :src="'/images/' + articles.images" alt="img-article">
            </div>

            <div class="container box-15">
                <div class="box-author">
                    <div class="box-img-author">
                        <img class="img-author" src="/assets/images/user_default.jpg" alt="img-author">
                    </div>
                    <div class="box-name-date ml-4">
                        <p class="name-author">Richard Gervain - Author</p>
                        <p class="date-created">Wed, March 3rd 2021</p>
                    </div>
                </div>
                <div class="box-like-bookmark">
                    <div class="box-like2">
                        <img src="/assets/images/like2.png" alt="icon-like">
                        <p>2.1k</p>
                    </div>
                    <img src="/assets/images/tape2.png" alt="icon-bookmark">
                </div>
            </div>

            <div class="container content-article mt-5 mb-5">
                <p class="title2">{{articles.title}}</p>
                <p class="description">{{ articles.description}}</p>
            </div>
            <!-- Read Article End --> 
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'ReadArticle',
    components: {
        Header,
        Footer
    },
    data () {
        return {
            articles: [],
            token: localStorage.getItem('jwt')
        }
    },
    mounted () {
        axios.get('http://localhost:8000/api/articles/' + this.$route.params.id, {headers: { 'Authorization' : 'Bearer '+ this.token}})
        .then ((response) => {
            this.articles = response.data
        })
    }
}
</script>

<style>
#read-article {
    display: flex;
    align-items: center;
}
#read-article h1 {
    margin-left: 35%;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 33px;
}
.img-article {
    width: 100%;
    height: 100%;
    object-fit: contain;
}
.box-15 {
    display: flex;
    justify-content: space-between;
}
.box-author {
    display: flex;
}
.box-img-author {
    width: 70px;
}
.img-author {
    width: 100%;
    border-radius: 12px;
    object-fit: contain;
}
.box-name-date {
    display: flex;
    flex-direction: column;
    align-self: center;
}
.name-author {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 200;
    font-size: 18px;
    line-height: 25px;
    color: #2D4379;
    margin: 0;
}
.date-created {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #7B8BB2;
    margin: 0;
}
.box-like-bookmark {
    display: flex;
    justify-content: space-between;
    width: 12%;
    align-items: center;
}
.box-like2 {
    display: flex;
    width: 60%;
    justify-content: space-between;
    align-items: center;
}
.box-like2 p {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 200;
    font-size: 18px;
    line-height: 24px;
    color: #2D4379;
    margin: 0;
}
.title2 {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 36px;
    line-height: 49px;
    color: #000000;
}
.description {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 27px;
    color: #0D253C;
}
</style>