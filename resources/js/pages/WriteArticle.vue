<template>
    <div>
        <Header />
        <!-- Write Article Start -->
        <div class="container mt-5" id="write-article">
            <div class="box-13">
                <router-link to='/'><img src="assets/images/back1.png" alt="back-icon">Back</router-link>
            </div>
            <h1>Write Article</h1>
        </div>
        
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-lg-4" id="box-upload">
                    <label for="upload-image" class="out-border">
                        <div class="in-border" v-if="previewImg">
                            <img class="img-article" id="update-photo" :src="previewImg" alt="img-article">
                        </div>
                        <div class="in-border" v-else>
                            <img src="assets/images/plus.png" alt="icon-plus">
                        </div>
                        <input type="file" class="upload-image" id="upload-image" accept="image/x-png/,image/gif,image/jpeg" v-on:change="upload">
                    </label>
                    <label for="upload-image" class="label-btn mt-5">
                        <p class="btn">Choose Cover Photo</p>
                    </label>
                </div>
                <div class="row" style="width: 65%; height: max-content">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Article title" class="article-title" v-model="articleTitle">
                    </div>
                    <div class="col-lg-6">
                        <form id="select-category">
                            <select name="article-category" id="articleCategory" style="background-image: url('assets/images/arrow-down.png'); background-repeat: no-repeat; background-position-x: 90%; background-position-y: 50%" v-on:change="addCategory">
                                <option hidden>Article Category</option>
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
                        <img src="assets/images/image.png" alt="icon-image">
                        <img src="assets/images/play.png" alt="icon-play2">
                        <img src="assets/images/align.png" alt="icon-align">
                        <img src="assets/images/link.png" alt="icon-link">
                        <img src="assets/images/scale.png" alt="icon-scale">
                    </div>
                    <div class="row" style="width: 100%">
                        <div class="col-lg-12">
                            <textarea class="type-article" placeholder="Type Article" v-model="typeArticle"></textarea>
                            <button class="btn-publish" @click="createArticle">Request Publish Article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Write Article End -->
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header'
import Footer from '../components/Footer'

export default {
    name: 'WriteArticle',
    components: {
        Header,
        Footer
    },
    data () {
        return {
            articleTitle: '',
            category: '',
            typeArticle: '',
            previewImg: '',
            image: '',
            user: JSON.parse(localStorage.getItem('user')),
            token: localStorage.getItem('jwt'),
            errors: [] 
        }
    },
    methods: {
        addCategory () {
            const categoryValue = document.getElementById('select-category').articleCategory.value
            this.category = categoryValue
        },
        upload (event) {
            const files = (event.target.files[0])
            this.image = files
            this.previewImg = URL.createObjectURL(event.target.files[0])
        },
        createArticle() {
            let form = new FormData()
            form.append('user_id', this.user.id)
            form.append('images', this.image)
            form.append('title', this.articleTitle)
            form.append('category', this.category)
            form.append('description', this.typeArticle)
            form.append('_token', this.token)
            
            axios.post('api/write-article/' + this.user.id, form, {headers: { 'Authorization' : 'Bearer '+ this.token}})
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
.box-13, #write-article {
    display: flex;
    align-items: center;
}
.box-13 img {
    padding: 0 20px 0 0;
}
.box-13 a {
    margin: 0;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 24px;
    display: flex;
    align-items: center;
    color: #0D253C;
}
#write-article h1 {
    margin-left: 35%;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 24px;
    line-height: 33px;
}
.out-border {
    position: relative;
    width: 100%;
    height: 535px;
    border: 1px solid rgba(55, 106, 237, 0.3);
    box-sizing: border-box;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.in-border {
    position: absolute;
    width: 81%;
    height: 470px;
    border: 5px dashed rgba(55, 106, 237, 0.3);
    box-sizing: border-box;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.in-border .img-article {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.in-border img {
    width: 64px;
}
#box-upload input {
    opacity: 0;
}
#box-upload .label-btn {
    width: 100%;
    height: 74px;
    background: #0D253C;
    border-radius: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
#box-upload .label-btn p {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 27px;
    color: #FFFFFF;
    margin: 0;
}
.article-title {
    width: 100%;
    height: 65px;
    padding: 0 30px;
    border: 1px solid rgba(55, 106, 237, 0.3);
    box-sizing: border-box;
    border-radius: 16px;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: rgba(55, 106, 237, 0.3);
    outline: none;
}
.article-title:focus {
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    color: black;
}
.article-title::placeholder {
    color: rgba(55, 106, 237, 0.3);
}
#articleCategory {
    width: 100%; 
    height: 65px; 
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: rgba(55, 106, 237, 0.3);
    padding: 0 30px;
    border: 1px solid rgba(55, 106, 237, 0.3);
    box-sizing: border-box;
    border-radius: 16px;
    appearance: none;
}
#articleCategory:focus {
    color: black;
    border-color: none;
    outline: none;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
option {
    color: black;
}
.box-attachment {
    display: flex;
    margin: 20px 15px 5px 15px;
    width: 50%;
    height: max-content;
    justify-content: space-between;
}
.attachment {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 27px;
    color: #376AED;
    margin: 0;
}
.box-attachment img {
    width: 32px;
    height: 32px;
}
.type-article {
    margin: 15px;
    width: 100%;
    height: 397px;
    border: 1px solid rgba(55, 106, 237, 0.3);
    box-sizing: border-box;
    border-radius: 16px;
    padding: 30px;
    outline: none;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: rgba(55, 106, 237, 0.3);
}
.type-article::placeholder {
    color: rgba(55, 106, 237, 0.3);
}
.type-article:focus {
    color: black;
    border-color: none;
    outline: none;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
}
.btn-publish {
    width: 100%;
    height: 74px;
    background: #376AED;
    box-shadow: 0px 0px 20px rgba(55, 106, 237, 0.6);
    border-radius: 16px;
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 900;
    font-size: 20px;
    line-height: 27px;
    color: #FFFFFF;
    border: none;
    margin: 27px 15px 0 15px
}
</style>