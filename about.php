<!-- <!DOCTYPE html>
<html>
<head>
	<title>Teams</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
</head> -->

<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap');
@import url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
body{
	margin:0;
	font-family: 'Open Sans', sans-serif;
}
*{
	box-sizing: border-box;
}

.team-section{
	/* background-color:#000000; */
    background-image: linear-gradient(to right, #0020dd, #0575E6);
	min-height: 100vh;
	padding:70px 15px 30px;
}

.container{
	max-width: 1170px;
	margin:auto;
}

.row{
	display: flex;
	flex-wrap: wrap;
}

.team-section .section-title{
	flex-basis: 100%;
	max-width: 100%;
	margin-bottom: 70px;
}

.team-section .section-title h1{
	font-size: 40px;
	text-align: center;
	margin:0;
	color: #ffffff;
	font-weight: 700;
}

.team-section .section-title p{
	font-size:16px;
	text-align: center;
	margin:15px 0 0;
	color:#ffffff;
}
.team-section .team-items{
	
	flex-basis: 100%;
	max-width: 100%;
	display: flex;
	flex-wrap: wrap;
	justify-content: space-around;
}
.team-section .team-items .item{
 flex-basis: calc(20% - 30px);
 max-width: calc(20% - 30px);
 transition: all .5s ease;
 margin-bottom: 40px;
}
.team-section .team-items .item img{
	display: block;
	width: 100%;
	padding : 14px;
	border-radius: 25px;
}

.team-section .team-items .item .inner{
	/* position: relative;
	z-index: 11;
	padding:0 15px; */
}
.team-section .team-items .item .inner .info{
	background-color:#050505;
	text-align: center;
	padding: 10px 5px;
	border-radius:8px;
	transition: all .5s ease;
	margin-top: -40px;
}
.team-section .team-items .item:hover  .info{
    transform: translateY(-20px);
}
.team-section .team-items .item:hover{
 transform: translateY(-10px);	
}
.team-section .team-items .item .inner .info h5{
	margin:0;
	font-size: 13px;
	font-weight: 600;
	color:#ffffff;
}
.team-section .team-items .item .inner .info p{
	font-size: 13px;
	font-weight: 400;
	color:#c5c5c5;
	margin:10px 0 0;
}

.team-section .team-items .item .inner .info .social-links{
	padding-top: 15px;
}

.team-section .team-items .item .inner .info .social-links a{
	display: inline-block;
	height: 28px;
	width: 28px;
	background-color: #ffffff;
	color:#070707;
	border-radius: 50%;
	margin:0 2px;
	text-align: center;
	line-height: 32px;
	font-size:16px;
	transition: all .5s ease;
}
img{
    
}


.team-section .team-items .item .inner .info .social-links a:hover{
	box-shadow: 0 0 15px #000;
}

/*responsive*/
@media(max-width: 991px){
	.team-section .team-items .item{
      flex-basis: calc(50% - 30px);
       max-width: calc(50% - 30px);

   }
}

@media(max-width: 767px){
	.team-section .team-items .item{
      flex-basis: calc(100%);
       max-width: calc(100%);

   }
}
    
</style>
<!-- <body> -->
  
  <section class="team-section">
     <div class="container">
         <div class="row">
             <div class="section-title">
                 <h1>Our Teams</h1>
                 <p><i>"health is more important than wealth"</i></p>
             </div>
         </div>
         <div class="row">
             <div class="team-items">
                  <div class="item">
                      <img src="image/n1.jpeg" alt="team" class="img-circle"/>
                      <div class="inner">
                          <div class="info">
                               <h5>M. Ilhamsyah</h5>
                               <p>Teknik Informatika</p>
                               <p>1810631170009</p>
                               <p><i>"Jangan Lupa Bernafas"</i></p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="image/n2.jpeg" alt="team" class="img-responsive"/>
                      <div class="inner">
                          <div class="info">
                               <h5>Iskandar Zulkarnaen</h5>
                               <p>Teknik Informatika</p>
                               <p>1810631170102</p>
                               <p><i>"Jangan Sia-Siakan Kesempatan"</i></p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="image/n3.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Raynaldi Mahdi Putra</h5>
                               <p>Teknik Informatika</p>
                               <p>1810631170229</p>
                               <p><i>"Rencana Yang Sempurna Adalah Sesuatu Yang Tidak Direncanakan"</i></p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="team-items">  
                  <div class="item">
                      <img src="image/n4.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Alfina Noviyanti</h5>
                               <p>Teknik Informatika</p>
                               <p>1810631170035</p>
                               <p><i>"Hal Baik Akan Baik Dengan Niat Baik"</i></p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <img src="image/n5.jpeg" alt="team" />
                      <div class="inner">
                          <div class="info">
                               <h5>Arees Khattara</h5>
                               <p>Teknik Informatika</p>
                               <p>1810631170140</p>
                               <p><i>"Jangan Sia-Siakan Waktu"</i></p>
                               <div class="social-links">
                                   <a href=""><span class="fa fa-facebook"></span></a>
                                   <a href=""><span class="fa fa-twitter"></span></a>
                                   <a href=""><span class="fa fa-instagram"></span></a>
                                   <a href=""><span class="fa fa-youtube"></span></a>
                               </div>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                    <img src="image/n6.jpeg" alt="team" />
                    <div class="inner">
                        <div class="info">
                             <h5>Rama Amanah</h5>
                             <p>Teknik Informatika</p>
                             <p>1810631170032</p>
                               <p><i>"Sebelum Mengenal Tuhan, Kenali Diri Sendiri Terlebih Dahulu"</i></p>
                             <div class="social-links">
                                 <a href=""><span class="fa fa-facebook"></span></a>
                                 <a href=""><span class="fa fa-twitter"></span></a>
                                 <a href=""><span class="fa fa-instagram"></span></a>
                                 <a href=""><span class="fa fa-youtube"></span></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
  </section>

<!-- </body>
</html> -->
