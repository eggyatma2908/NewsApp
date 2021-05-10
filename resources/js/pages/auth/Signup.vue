<template>
    <!-- Signup -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6" id="left-1">
                <div class="box-left">
                    <div class="box-1">
                        <router-link to="/"><img src="assets/images/back.png" alt="back-icon"></router-link>
                        <p>Home Page</p>
                    </div>
                    <div class="box-2">
                        <h1>News Today</h1>
                    </div>
                    <p class="mail">newstoday@mail.com</p>
                    <div class="box-3">
                        <span class="line-left"></span>
                        <p>Already have an account?</p>
                        <span class="line-right"></span>
                    </div>
                    <router-link to="login"><button class="btn-login">Login Here</button></router-link>
                    <div class="row">
                        <div class="col-lg-6" id="left-2">
                            <a href="#"><li class="mb-4">Why News Today</li></a>
                            <a href="#"><li>Community</li></a>
                        </div>
                        <div class="col-lg-6" id="right-2">
                            <a href="#"><li class="mb-4">Be an author</li></a>
                            <a href="#"><li>FAQ</li></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" id="right-1">
                <div class="box-right">
                    <h1>Sign Up</h1>
                    <p>Hey, welcome to News Today! Create an account to enjoy our full feautres!</p>
                    <div class="box-email">
                        <h1>Email Address :</h1>
                        <input type="email" placeholder="Enter your email address" v-model="form.email">
                    </div>
                    <div class="box-password">
                        <h1>Password :</h1>
                        <input type="password" placeholder="Enter your password" v-model="form.password">
                    </div>
                    <div class="box-phone-number">
                        <h1>Phone Number :</h1>
                        <input type="number" placeholder="Enter your phone number" v-model="form.phoneNumber">
                    </div>
                    <button class="btn-signup" @click.prevent="register">Sign Up</button>
                    <h6>OR SIGN UP WITH</h6>
                    <div class="box-social-media">
                        <router-link to="#"><img src="assets/images/icon-google.png"></router-link>
                        <router-link to="#"><img src="assets/images/icon-facebook.png"></router-link>
                        <router-link to="#"><img src="assets/images/icon-twitter.png"></router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Signup End -->
</template>

<script>
export default {
    name: 'Register',
    data () {
        return {
            form: {
                email: '',
                password: '',
                phoneNumber: '',
            },
            errors: []
        }
    },
    methods : {
        register() {
            axios.post('api/register', this.form)
                .then(response => {
                    let data = response.data; 
                    localStorage.setItem('user', JSON.stringify(data.user))
                    localStorage.setItem('jwt', data.token)
                    if(data.status) {
                        this.$noty.success(data.message)
                        this.$router.push({ name: 'Home', params: { userId: data.user.id } });
                    }
                })
                .catch(error => {
                    this.errors = error.response.data;
                    if(this.errors.status === false) {
                        this.$noty.error(this.errors.message[0] || this.errors.message[1] || this.errors.message[2])
                    }
                });
        }
    }

}
</script>

<style>
body {
    font-family: 'Avenir', Helvetica, sans-serif;
}
#left-1 {
    background-color: #376AED;
    height: 1024px;
}
.box-left {
    padding: 75px 60px;
}
.box-1 {
    display: flex;
    align-items: center;
}
.box-1 p {
    margin: 0 0 0 30px;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 24px;
    color: white;
}
.box-2 h1 {
    margin: 100px 100px 10px 100px;
    height: 195px;
    font-style: normal;
    font-weight: 600;
    font-size: 72px;
    line-height: 98px;
    color: white;
    text-align: center;
}
.mail {
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 33px;
    text-align: center;
    text-decoration-line: underline;
    color: #FFFFFF;
}
.box-3 {
    display: flex;
    margin: 100px 0 50px 0;
    position: relative;
    align-items: center;
    justify-content: center;
}
.box-3 p {
    margin: 0;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 30px;
    color: #FFFFFF;
}
.line-left {
    position: absolute;
    width: 136px;
    left: 4%;
    border: 2px solid #9DB6F6;
}
.line-right {
    position: absolute;
    width: 136px;
    right: 4%;
    border: 2px solid #9DB6F6;
}
.btn-login {
    margin: 0 20px 160px 20px;
    width: 90%;
    height: 75px;
    background: #0D253C;
    border-radius: 20px;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: white;
    border: none;
    align-content: center;
}
#left-2 li, #right-2 li {
    margin: 0 20px;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 33px;
    color: #FFFFFF;
    list-style: none;
}
.box-right {
    padding: 75px 60px;
}
.box-right h1 {
    font-style: normal;
    font-weight: 600;
    font-size: 36px;
    line-height: 49px;
    color: #0D253C;
}
.box-right p {
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #7B8BB2;
}
.box-email {
    margin: 40px 0 0 0;
}
.box-password, .box-phone-number {
    margin: 30px 0 0 0;
}
.box-email h1, .box-password h1, .box-phone-number h1 {
    margin: 0 0 15px 0;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 27px;
    color: #0D253C;
}
.box-email input, .box-password input, .box-phone-number input {
    padding: 25px 30px;
    width: 90%;
    height: 75px;
    left: 840px;
    top: 265px;
    background: #FFFFFF;
    border: 1px solid #CEE1F2;
    box-sizing: border-box;
    border-radius: 20px;
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 27px;
    color: #7B8BB2;
    outline: none;
}
.btn-signup {
    margin: 50px 0;
    width: 90%;
    height: 75px;
    left: 840px;
    top: 677px;
    background: #376AED;
    border-radius: 20px;
    border: none;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: #FFFFFF;
}
.box-right h6 {
    margin: 0 0 20px 0;
    font-weight: 800;
    font-size: 18px;
    line-height: 18px;
    letter-spacing: 1.75px;
    text-transform: uppercase;
    color: #0D253C;
    text-align: center;
}
.box-social-media {
    display: flex;
    justify-content: space-between;
    margin: 0 150px;
}
</style>