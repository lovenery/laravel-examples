<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>臺灣郵遞區號查詢</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('include/css/bootstrap-3.3.7.min.css') }}">
    <style media="screen">
      #app {
        height: 100vh;
        width: 100vw;
        background-color: white;
        background: url("https://source.unsplash.com/category/nature/1920x1080") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }

      #submit-form {
        margin-top: 40px;
      }

      .lead-form {
        background-color: rgba(255, 255, 255, 0.6);
        border-radius: 5px;
        padding: 10px 50px 30px 50px;
        margin-top: 100px;
      }

      span.city-span {
        color: (#444);
        text-transform: uppercase;
        margin-left: 5px;
        margin-top: 10px;
      }

      .form-control {
        margin-bottom: 3px;
      }
    </style>
  </head>

  <body>
    <div id="app">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="lead-form">
              <h1 class="text-center">臺灣郵遞區號查詢</h1>
              <p class="text-muted text-center">Taiwan ZipCode Search</p>
              <hr />
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <input type="text" class="form-control" placeholder="郵遞區號(五碼) 例如: 10046" v-model="zipCode">
                  <span class="city-span">@{{areaCity}}</span>
                </div>
              </div>
              <br><br>
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    資料來源: <a href="http://data.gov.tw/" target="_blank">政府開放資料平台</a><br>
                    資料最後更新時間: 103年04月01日
                  </p>
                </div>
              </div>
            </div><!-- end of .lead-form -->
          </div> <!-- end of .col-md-6.col-md-offset-3 -->
        </div> <!-- end of .row -->
      </div> <!-- end of .container -->
    </div> <!-- end of #app -->
  </body>

  <script src="{{ asset('include/js/vue-2.0.3.js') }}"></script>
  <script src="{{ asset('include/js/axios-0.12.0.min.js') }}"></script>
  <script src="{{ asset('include/js/lodash-4.13.1.min.js') }}"></script>

  <script>
    var app = new Vue({
      el: '#app',
      data: {
        zipCode: '',
        areaCity: ''
      },
      watch: {
        zipCode: function() {
          this.areaCity = ''
          if (this.zipCode.length == 5) {
            this.lookupZipCode()
          }
        }
      },
      methods: {
        // _.debounce(xxx, 500), lodash(low dash), wait 0.5s and run
        lookupZipCode: _.debounce(function() {
          var app = this
          app.areaCity = "尋找中...請稍候..."
          axios.get('{{ $domain }}' + '/zipcode?c=' + app.zipCode)
                .then(function (response) {
                  app.areaCity = response.data.area
                })
                .catch(function (error) {
                  app.areaCity = "不知名的錯誤"
                })
        }, 500)
      }
    })
  </script>
</html>
