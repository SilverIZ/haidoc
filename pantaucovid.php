<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?php echo BASE_URL."css/style.css";?>" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
        crossorigin="anonymous">

    <title>PANTAU COVID</title>
  </head>
      <style>
          body{
            font-family : calibri;
            font-size:18px;
            color:#ffffff;
            background-image: linear-gradient(to right, #0020dd, #0575E6);
            background-size:cover;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 500px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        tbody,tr{
            background: white;
            color: black;
        }
        h3{
            text-align: center; 

        }
        .navbar-expand-md{
            box-shadow: 3px 5px 7px rgba(0,0,0,0.3);
        }

    </style>
  </head>
    <body onload="loadData()">
    <nav class="navbar navbar-expand-md navbar-dark">
        <a  class="navbar-brand" href="index.php">
            <h4 class="btn btn-block btn-danger"> << Kembali Ke Haidoc </h4>
            </a>
        <a class="text-center" style="margin-left: 25%">Data Berasal Dari covid19.mathdro.id</a>
    </nav>
    <br>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                         <div class="card-body">
                             <h4 class="card-title" style="color: black; text-align:center">
                                 Pantau COVID-19
                            </h4>
                            <hr>
                            <p class="card-text">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="color: black; text-align:center">
                                        <h5>Data COVID-19 di Dunia</h5>
                                         <span><b style="color: black; text-align:center">Update Terakhir : <small id="last-update-indonesia" ></small></b></span>
                                         <hr>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                             <div class="card-body text-center bg-primary" >
                                                <h1 class="card-title" id="global-indonesia-terinfeksi">0</h1>
                                                <p class="card-text">Terinfeksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body text-center bg-danger" >
                                                <h1 class="card-title" id="global-indonesia-meninggal">0</h1>
                                                <p class="card-text">Meninggal</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body text-center bg-success" >
                                                <h1 class="card-title" id="global-indonesia-sembuh">0</h1>
                                                <p class="card-text">Sembuh</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 20px;">
                                        <h5 class="text-center">Data Global</h5>
                                    <hr>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body text-center bg-primary" >
                                            <h1 class="card-title" id="global-terinfeksi">0</h1>
                                            <p class="card-text">Terinfeksi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body text-center bg-danger" >
                                            <h1 class="card-title" id="global-meninggal">0</h1>
                                            <p class="card-text">Meninggal</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body text-center bg-success" >
                                            <h1 class="card-title" id="global-sembuh">0</h1>
                                            <p class="card-text">Sembuh</p>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-12" style="margin-top: 30px;">
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-inverse">
                        <tr>
                                <th>Negara</th>
                                <th>Terinfeksi</th>
                                <th>Meninggal</th>
                                <th>Sembuh</th>
                                <th>Update Terakhir</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted" style="color: white; text-align:center">
                Sumber Data : <a href=" https://covid19.mathdro.id/">Covid-19 Mathdro.id</a> <br>
            </div>
        </div>
            
    <!-- Modal -->
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- API Data covid -->
    <script>
        function loadData() {
            $.ajax({
                type: "GET",
                url: "https://covid19.mathdro.id/api",
                success: function(data) {
                    $('#global-terinfeksi').text(data.confirmed.value)
                    $('#global-meninggal').text(data.deaths.value)
                    $('#global-sembuh').text(data.recovered.value)
                }
            })
            $.ajax({
                type: "GET",
                url: "https://covid19.mathdro.id/api/countries/ID",
                success: function(data) {
                    let date = new Date(data.lastUpdate);
                    $('#last-update-indonesia').text(date)
                    $('#global-indonesia-terinfeksi').text(data.confirmed.value)
                    $('#global-indonesia-meninggal').text(data.deaths.value)
                    $('#global-indonesia-sembuh').text(data.recovered.value)
                }
            })
            $.ajax({
                type: "GET",
                url:  "https://covid19.mathdro.id/api/countries",
                success: function(data) {
                    let countries = data.countries;
                    let countriesName = [];
                    var results = [];

                    Object.values(countries).forEach((value, index) => {
                        let tbody = '';
                        $.ajax({
                            type: "GET",
                            url: "https://covid19.mathdro.id/api/countries/"+value.name,
                            success: function(data2) {
                                let date = new Date(data2.lastUpdate);
                                tbody += "<tr>";
                                    tbody += "<td>"+value.name+"</td>";
                                    tbody += "<td>"+data2.confirmed.value+"</td>";
                                    tbody += "<td>"+data2.deaths.value+"</td>";
                                    tbody += "<td>"+data2.recovered.value+"</td>";
                                    tbody += "<td>"+date+"</td>";
                                tbody += "</tr>";

                                $('table #tbody').append(tbody);
                            }
                        })
                    })
                }
            })
        }
    </script>
  </body>
</html>