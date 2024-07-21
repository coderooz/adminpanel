<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Code Generator</h1>
    </div>
    <style>.assertdiv .card-header{height: 50px; color: white;}.assertdiv .card-body h5.card-title{font-size: 25px; color: black; font-weight: 700;}.assertdiv .card-body p.card{font-weight: 500;}</style>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #2196f3;"></div>
                <div class="card-body">
                    <h5 class="card-title"><i style="color:coral" class="fab fa-css3-alt"></i> Css Generator</h5>
                    <p class="card-text">Generate highly customizable CSS properties. Preview the results live before
                        copying to your website.</p>
                    <a href="./generator/css"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #ff9800;"></div>
                <div class="card-body">
                    <h5 class="card-title"><i style="color:orange" class="fab fa-html5"></i> Html Generator</h5>
                    <p class="card-text">Generate highly customizable HTML elements. Preview the results live before copying to your website.</p>
                   <a href="./generator/html"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>

        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #f44336;"></div>
                <div class="card-body">
                    <h5 class="card-title">JSON-LD Generator</h5>
                    <p class="card-text">Generate schema.org markup for a better browsing experience for your users in search engines.</p>
                    <a href="./generator/json-ld"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #9c27b0;"></div>
                <div class="card-body">
                    <h5 class="card-title">Meta Tags Generator</h5>
                    <p class="card-text">Generate the most useful meta tags for your web page to improve SEO and search engine experience.</p>
                    <a href="./generator/meta-tags"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #3f51b5;"></div>
                <div class="card-body">
                    <h5 class="card-title">Open Graph Generator</h5>
                    <p class="card-text">Generate Open Graph meta tags to attract more visitors to your website when it’s shared on Facebook, Pinterest and LinkedIn..</p>
                    <a href="./generator/open-graph"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>
            <div class="card assertdiv shadow mb-4 border border-primary shadow-0 ">
                <div class="card-header" style="background-color: #03a9f4;"></div>
                <div class="card-body">
                    <h5 class="card-title">Twitter Card Generator</h5>
                    <p class="card-text">Generate Twitter Cards to drive more traffic to your website when it’s shared on Twitter by attaching photos, videos and media to your Tweets..</p>
                    <a href="./generator/twitter-card"><button type="button" class="btn btn-primary">Generate</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php
  include('includes/script-2.php');
  include('includes/footer.php');
?>
</body>

</html>