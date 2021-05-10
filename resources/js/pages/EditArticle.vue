<template>
    <div>
        <Header />

        <div class="container mt-5" id="write-article">
            <div class="box-13">
                <router-link to='/'><img src="/assets/images/back1.png" alt="back-icon">Back</router-link>
            </div>
            <h1>Edit Article</h1>
        </div>
        
        <div class="container">
            <div class="row mt-5 mb-5 d-flex justify-content-center">
                <div class="row" style="width: 65%; height: max-content">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Article title" class="article-title" v-model="dataArticle.title">
                    </div>
                    <div class="col-lg-6">
                        <form id="select-category">
                            <select v-if="dataArticle.category" name="article-category" id="articleCategory" style="background-image: url('/assets/images/arrow-down.png'); background-repeat: no-repeat; background-position-x: 90%; background-position-y: 50%" v-on:change="addCategory">
                                <option hidden>{{dataArticle.category}}</option>
                                <option value="Economy">Economy</option>
                                <option value="Politics">Politics</option>
                                <option value="Country">Country</option>
                                <option value="Health">Health</option>
                                <option value="Beauty">Beauty</option>
                                <option value="Sport">Sport</option>
                            </select> 
                        </form>
                    </div>
                    <div class="box-attachment">
                        <h1 class="attachment">Attachment : </h1>
                        <img src="/assets/images/image.png" alt="icon-image">
                        <img src="/assets/images/play.png" alt="icon-play2">
                        <img src="/assets/images/align.png" alt="icon-align">
                        <img src="/assets/images/link.png" alt="icon-link">
                        <img src="/assets/images/scale.png" alt="icon-scale">
                    </div>
                    <div class="row" style="width: 100%">
                        <div class="col-lg-12">
                            <textarea class="type-article" placeholder="Type Article" v-model="dataArticle.description"></textarea>
                            <button class="btn-publish" @click="updateArticle">Update Article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'EditArticle',
    components: {
        Header,
        Footer
    },
    data () {
        return {
            articles: [],
            dataArticle: {
                title: '',
                category: '',
                description: '',
                user_id: ''
            },
            token: localStorage.getItem('jwt'),
            errors: []
        }
    },
    mounted () {
        axios.get('http://localhost:8000/api/articles/' + this.$route.params.id, {headers: { 'Authorization' : 'Bearer '+ this.token}})
        .then ((response) => {
            this.dataArticle = {
                title: response.data.title,
                description: response.data.description,
                category: response.data.category,
                user_id: response.data.user_id
            }
        })
    },
     methods: {
        addCategory () {
            const categoryValue = document.getElementById('select-category').articleCategory.value
            this.dataArticle.category = categoryValue
        },
        updateArticle() {
            axios.put('http://localhost:8000/api/articles/' + this.$route.params.id, this.dataArticle, { headers: { 'Authorization' : 'Bearer '+ this.token} })
            .then(response => {
                if(response.data.status) {
                    this.$noty.success(response.data.message)
                    this.$router.push( { name: 'Home'} )
                }
            })
            .catch(error => {
                this.errors = error.response.data;
                    if(this.errors.status === false) {
                        this.$noty.error(this.errors.message[0] || this.errors.message[1] || this.errors.message[2] || this.errors.message[3])
                    }
            });
        },
        onInputUploadChange () {
            const self = this
            $('#upload-image').change(function () {
            self.readImgUrlAndPreview(this)
            })
        },
        readImgUrlAndPreview (input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader()
                reader.onload = function (e) {
                    $('#update-photo').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    }
}
</script>

<style>

</style>