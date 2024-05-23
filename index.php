<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- vuejs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Custom style -->
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <div id="app">
        <!-- NAVBAR -->
        <section class="navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2">
                        <img src="./img/spotify_logo.png" alt="Logo spotify" class="navbar-logo">
                    </div>
                    <div class="col-10"></div>
                </div>
            </div>
        </section>
        <!-- /NAVBAR -->
        <!-- MAIN SECTION -->
        <div class="container mt-5">
            <div class="row">
                <div v-for="disk in diskList" class="col-4 card-container">
                    <div class="card ms_card">
                        <div class="poster">
                            <img :src="disk.poster" class="" alt="">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{ disk.title }}</h6>
                            <p class="card-text">{{ disk.author }}</p>
                            <h6>{{ disk.year }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /MAIN SECTION -->

    </div>

    <script src="./js/script.js"></script>
</body>

</html>