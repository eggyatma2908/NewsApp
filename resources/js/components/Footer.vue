<template>
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6" id="left">
                    <li>Why News Today</li>
                    <li>Be an author</li>
                    <li>Community</li>
                    <li>FAQ</li>
                </div>
                <div class="col-lg-6" id="right">
                    <li class="title">News Today</li>
                    <li class="address">Jendral Sudirman Street No.23 Jakarta, Indonesia</li>
                    <li>(621)989898934</li>
                    <li>newstoday@mail.com</li>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    
}
</script>

<style>
footer {
    width: 100%;
    height: 400px;
    background: #376AED;;
}
footer .row {
    padding: 100px;
    justify-content: space-between;
}
#left {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 50px;
    color: #FFFFFF;
    list-style: none;
    text-align: start;
}
#right {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 35px;
    color: #FFFFFF;
    list-style: none;
    text-align: end;
}
.title {
    font-family: 'Avenir', Helvetica, sans-serif;
    font-style: normal;
    font-weight: 600;
    font-size: 32px;
    line-height: 49px;
    color: #FFFFFF;
}
.address {
    margin-left: 40%;
}
</style>