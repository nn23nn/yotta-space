<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->



    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Minovate - Admin Dashboard</title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">




        <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
        <!-- vendor css files -->
        <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/vendor/animate.css">
        <link rel="stylesheet" href="/assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/js/vendor/animsition/css/animsition.min.css">

        <!-- project main css files -->
        <link rel="stylesheet" href="/assets/css/main.css">
        <!--/ stylesheets -->



        <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
        <script src="/assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!--/ modernizr -->




    </head>





    <body id="minovate" class="appWrapper">






        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->












        <!-- ====================================================
        ================= Application Content ===================
        ===================================================== -->
        <div id="wrap" class="animsition">




            <div class="page page-core page-404">

                <div class="text-center"><h3 class="text-light text-white"><span class="text-lightred">M</span>INOVATE</h3></div>

                <div class="container w-420 p-15 bg-white mt-40 text-center">

                    <h2 class="text-light text-greensea">{{$data['msg']}} <strong></strong></h2>

                    <p class="text-muted"><span id="jumpTo">5</span>秒后自动跳转</p>

                    <div class="bg-slategray lt wrap-reset mt-40 text-center">
                        <button class="btn btn-greensea btn-sm b-0"><i class="fa fa-home"></i> Return to home</button>
                        <button class="btn btn-lightred btn-sm b-0"><i class="fa fa-envelope-o"></i> Contact support</button>
                    </div>

                </div>

            </div>
			<script type="text/javascript">
			function countDown(secs,surl){ 
			 //alert(surl); 
			 var jumpTo = document.getElementById('jumpTo');
			 jumpTo.innerHTML=secs; 
			 if(--secs>0){ 
			  setTimeout("countDown("+secs+",'"+surl+"')",1000); 
			 }
			 else
			 {  
			  location.href=surl; 
			 } 
			} 
			countDown(5,"{{$redirect_url}}");
			</script>


        </div>
        <!--/ Application Content -->














        <!-- ============================================
        ============== Vendor JavaScripts ===============
        ============================================= -->
        <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="/assets/js/vendor/jRespond/jRespond.min.js"></script>

        <script src="/assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="/assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="/assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="/assets/js/vendor/screenfull/screenfull.min.js"></script>
        <!--/ vendor javascripts -->




        <!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
        <script src="/assets/js/main.js"></script>
        <!--/ custom javascripts -->






        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                

            });
        </script>

        <script type="text/javascript"> 
			function countDown(secs,surl){ 
			 //alert(surl); 
			 var jumpTo = document.getElementById('jumpTo');
			 jumpTo.innerHTML=secs; 
			 if(--secs>0){ 
			  setTimeout("countDown("+secs+",'"+surl+"')",1000); 
			 }
			 else
			 {  
			  location.href=surl; 
			 } 
			} 
		</script>
        <!--/ Page Specific Scripts -->



    </body>
</html>
