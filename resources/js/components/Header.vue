<template>
    <header>
        <div class="container-fluid">
            <div class="box-header">
                <h1>News Today</h1>
                <div class="box-nav">
                    <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
                    <li><router-link :to="{ name: 'Articles' }">Articles</router-link></li>
                    <li><router-link :to="{ name: 'Category' }">Category</router-link></li>
                    <li v-if="isLoggedIn"><router-link :to="{ name: 'WriteArticle' }">Write Article</router-link></li>
                </div>
                <input type="text" id="search" placeholder="Search">
                <div class="boxprofile" v-if="isLoggedIn" @click.prevent="show">
                    <img v-if="this.$route.params.id" class="photo" src="/assets/images/user_default.jpg" alt="img-profile">
                    <img v-else class="photo" src="assets/images/user_default.jpg" alt="img-profile">
                    <div id="dropdown">
                        <li><router-link :to="{ name: 'Home' }">Home</router-link></li>
                        <li><router-link :to="{ name: 'MyArticle' }">My Article</router-link></li>
                        <li><router-link :to="{ name: 'Articles' }">Articles</router-link></li>
                        <li><router-link :to="{ name: 'Category' }">Category</router-link></li>
                        <li><router-link :to="{ name: 'WriteArticle' }">Write Article</router-link></li>
                        <li @click="logout">Logout</li>
                    </div>
                </div>
                <div class="box-1" v-else>
                    <router-link to="/register" class="signup">Sign up</router-link>
                    <router-link to="/login"><button class="login">Login</button></router-link>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    data () {
        return {
        user: null,
        isLoggedIn: null, 
        }
    },
    mounted () {
        this.isLoggedIn = localStorage.getItem('jwt') !== null; 
        this.user = JSON.parse(localStorage.getItem('user')) 
    },
    methods: {
        show() {
            document.getElementById('dropdown').classList.toggle('active')
        },
        logout(){
            localStorage.removeItem('jwt')
            localStorage.removeItem('user')
            this.$noty.success('Logout success')
            this.$router.push('/login')
        }
    }
    
}
</script>

<style>
header {
    border-bottom: 1px solid #D6D6D6;
}
.box-header {
    display: flex;
    justify-content: space-around;
    padding: 30px 0;
}
.box-header h1 {
    font-family: Georgia;
    font-style: normal;
    font-weight: bold;
    font-size: 36px;
    line-height: 41px;
    color: #0D253C;
}
.box-nav {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    list-style: none;
    width: 30%;
}
.box-nav a, #dropdown a, #dropdown li {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 27px;
    color: #CDCDCD;
    text-decoration: none;
}
.box-nav a:hover {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 27px;
    color: #0D253C;
}
#search {
    opacity: 0.3;
    border: 1px solid #376AED;
    box-sizing: border-box;
    border-radius: 10px;
    padding: 0 35px;
    background: url('/assets/images/search.png');
    background-repeat: no-repeat;
    background-position: left;
    background-position-x: 10px;
    outline: none;
}
#search:focus {
    opacity: 1;
}
#dropdown {
    position: absolute;
    top: 70px;
    right: 0;
    width: 150px;
    border: 1px solid black;
    background: black;
    border-radius: 12px;
    display: none;
    z-index: 99;
}
#dropdown.active {
    display: flex;
    flex-direction: column;
}
#dropdown li {
    list-style: none;
    text-align: center;
    padding: 10px 0;
    cursor: pointer;
}
#dropdown a:hover, #dropdown li:hover {
    color: grey;
}
.boxprofile {
    position: relative;
    width: 55px;
    height: 55px;
}
.photo {
    width: 100%;
    height: auto;
    border: 2px solid #3970ec;
    border-radius: 100px;
    cursor: pointer;
}
.box-1 {
    width: 250px;
    display: flex;
    justify-content: space-between;
}
a.signup {
    font-family: 'Lato', sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 24px;
    color: #000000;
    text-decoration: none;
}
.login {
    width: 145px;
    height: 50px;
    background: #376AED;
    border: 1px solid #376AED;
    box-sizing: border-box;
    border-radius: 4px;
    font-family: 'Lato', sans-serif;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 25px;
    text-align: center;
    color: #FFFFFF;
    text-decoration: none;
}
</style>