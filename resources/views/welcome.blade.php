@extends('layouts.app')

@section('content')
    <section id="intro" class="clearfix" style="margin-top: -20px;">
    <div class="container">
      <div class="row" >
        <div class="col-md-12">
            <img src="../img/bannerlogo.png" height="300" width="500">
        </div>
        <div class="col-md-12">

          <h1>Jobs Available</h1><br>
          <h3>{{$jobs->count()}}</h3>
          <span data-toggle="counter-up" style="color:black;"></span>

        </div>
        <div class="col-md-12" style="margin: auto; margin-top: 40px;">
          <a href="#Jobs">
              <button class="btn btn-primary">
                CLICK HERE TO FIND A JOB FOR YOU
              </button>
            </a>
        </div>
      </div>

      
    </div>
  </section>


    <!--==========================
      Job Available
    ============================-->
    <div class="wrapper">
      <div class="main-content">
        <div class="container">
          <header class="section-header">
            <h3 class="section-title" id="Jobs">Latest Jobs</h3>
          </header>
        </div>
        <div class="job-search">
          <div class="row">
            <div class="col-md-12">
              <div class="search-filters">
                <h4>Filters</h4>
                <form class="form" id="SearchForm" action="?" method="get">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Keyword</label>
                            <input type="text" class="form-control" placeholder="Keyword" style="width: 100%">
                          </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="category">Job Category:</label>
                                <select name="category" class="
                                    form-control">
                                    <option>-- Select --</option>
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->name}}">{{$cat -> name}}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-center" style="margin-top: 14px;">
                                <button class="btn btn-primary form-control">
                                    Search
                                </button>
                        </div>
                    </div>
                </form>
              </div>
              <br>
            </div>

          
            <div class="col-md-12">
              <div class="search-results">
                <div class="row">
                    @foreach($jobs as $job)
                  <div class="col-md-12 wow fadeInUp">
                    <article class="card job-item">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                @if(empty($job->company->logo))
                                  <img src="{{asset('avatar/ry.jpg')}}" class="img-thumbnail" width="250" height="250">
                                @else
                                  <img src="{{asset('uploads/logo')}}/{{$job -> company ->logo}}" class="img-thumbnail" width="250" height="250">
                                @endif
                            </div>
                            <div class="col-md-7">
                              <div class="card-body">
                                <h2 class="job-title">{{$job -> position}}</h2>
                                <div class="company-name">{{$job -> company_name}}</div>
                                <div class="company-date">Posted: {{ date('M-d-Y', strtotime($job -> created_at))}}</div>
                                <div class="company-description">Job Description: <br> 
                                  {{$job -> description}}
                                </div>
                                <div class="job-availability">No. of Job Vacancy ({{$job -> number_vacancy}})</div>
                              </div>
                            </div>

                            <div class="col-md-2 d-flex align-items-center" >
                              <a href="{{route('jobs.show',[$job -> id , $job ->position])}}">
                                <button class="btn btn-primary">View</button>
                              </a>
                            </div>
                        </div>
                        <br>
                    </article>
                  </div>
                  @endforeach
                  <div class="col-md-12">
                    @if(Auth::check() && Auth::user() -> user_type == 'seeker')
                      <a href="{{route('profile.listofjob')}}">
                        <button class="form-control btn-cdc">view all jobs</button>
                      </a>
                    @else
                    <a href="{{route('login')}}">
                      <button class="form-control btn-cdc">Please login to view more jobs</button>
                    </a>
                      
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
@endsection
<style>
     body {
  background: #fff;
  color: #444;
  font-family: "Open Sans", sans-serif;
}

a {
  color: #007bff;
  transition: 0.5s;
}

a:hover,
a:active,
a:focus {
  color: #0b6bd3;
  outline: none;
  text-decoration: none;
}

p {
  padding: 0;
  margin: 0 0 30px 0;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Montserrat", sans-serif;
  font-weight: 400;
  margin: 0 0 20px 0;
  padding: 0;
}

/* Back to top button */

.back-to-top {
  position: fixed;
  display: none;
  background: #007bff;
  color: #fff;
  width: 44px;
  height: 44px;
  text-align: center;
  line-height: 1;
  font-size: 16px;
  border-radius: 50%;
  right: 15px;
  bottom: 15px;
  transition: background 0.5s;
  z-index: 11;
}

.back-to-top i {
  padding-top: 12px;
  color: #fff;
}

/* Prelaoder */

#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #fff;
}

#preloader:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #f2f2f2;
  border-top: 6px solid #007bff;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}

@-webkit-keyframes animate-preloader {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }

  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

#header {
  height: 80px;
  transition: all 0.5s;
  z-index: 997;
  transition: all 0.5s;
  padding: 20px 0;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.3);
}

#header.header-scrolled,
#header.header-pages {
  height: 60px;
  padding: 10px 0;
}

#header .logo h1 {
  font-size: 36px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 3px;
  text-transform: uppercase;
}

#header .logo h1 a,
#header .logo h1 a:hover {
  color: #00366f;
  text-decoration: none;
}

#header .logo img {
  padding: 0;
  margin: 7px 0;
  max-height: 32px;
}

.main-pages {
  margin-top: 60px;
}

#header .button-nav li {
  border-width: 3px;
}

/*--------------------------------------------------------------
# Intro Section
--------------------------------------------------------------*/

#intro {
  width: 100%;
  position: relative;
  background: url("../img/Header-bg.png") center bottom no-repeat;
  background-size: cover;
  padding: 200px 0 120px 0;
}

#intro .intro-img {
  width: 50%;
  float: right;
}

#intro .intro-info {
  width: 50%;
  float: left;
}

#intro .intro-info h2 {
  color: #fff;
  margin-bottom: 20px;
  font-size: 75px;
  font-weight: 700;
}

#intro .intro-info h2 span {
  color: #f8703a ;
  text-decoration: underline;
}

#intro .intro-info .btn-get-started {
  font-family: "Montserrat", sans-serif;
  font-size: 15px;
  font-weight: 600;
  letter-spacing: 1px;
  display: inline-block;
  padding: 10px 32px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 60px 30px 30px 0;
  color: #fff;
}

#intro .intro-info .btn-get-started {
  background: #2176FF  ;
  border: 2px solid #2176FF ;
  color: #fff;

}

#intro .intro-info .btn-get-started:hover {
  background-color: #074995;
  border-color: #f75e22 ;
  color: #fff;
}




/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/

/* Desktop Navigation */

.main-nav {
  /* Drop Down */
  /* Deep Drop Down */
}

.main-nav,
.main-nav * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.main-nav > ul > li {
  position: relative;
  white-space: nowrap;
  float: left;
}

.main-nav a {
  display: block;
  position: relative;
  color: #074995;
  padding: 10px 15px;
  transition: 0.3s;
  font-size: 14px;
  font-family: "Montserrat", sans-serif;
  font-weight: 700;
}

.main-nav a:hover,
.main-nav .active > a,
.main-nav li:hover > a {
  color: #f75e22 ;
  text-decoration: none;
}

.main-nav .drop-down ul {
  display: block;
  position: absolute;
  left: 0;
  top: calc(100% + 30px);
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  padding: 10px 0;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: ease all 0.3s;
}

.main-nav .drop-down:hover > ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.main-nav .drop-down li {
  min-width: 180px;
  position: relative;
}

.main-nav .drop-down ul a {
  padding: 10px 20px;
  font-size: 13px;
  color: #004289;
}

.main-nav .drop-down ul a:hover,
.main-nav .drop-down ul .active > a,
.main-nav .drop-down ul li:hover > a {
  color: #007bff;
}

.main-nav .drop-down > a:after {
  content: "\f107";
  font-family: FontAwesome;
  padding-left: 10px;
}

.main-nav .drop-down .drop-down ul {
  top: 0;
  left: calc(100% - 30px);
}

.main-nav .drop-down .drop-down:hover > ul {
  opacity: 1;
  top: 0;
  left: 100%;
}

.main-nav .drop-down .drop-down > a {
  padding-right: 35px;
}

.main-nav .drop-down .drop-down > a:after {
  content: "\f105";
  position: absolute;
  right: 15px;
}

.main-nav .button-nav1{
  letter-spacing: 3px;
  padding: 0 30px 0; 
  border-color: #074995;
  border-style: solid;
  border-radius: 150px;
  margin: 0 10px 15px;
  border-width: 3px; 
}

.main-nav .button-nav2{
  letter-spacing: 3px;
  padding: 0 30px 0; 
  border-color: #074995;
  border-style: solid;
  border-radius: 150px;
  margin: 0 10px 15px;
  border-width: 3px; 

}
/* Mobile Navigation */

.mobile-nav {
  position: fixed;
  top: 0;
  bottom: 0;
  z-index: 9999;
  overflow-y: auto;
  left: -260px;
  width: 260px;
  padding-top: 18px;
  background: rgba(19, 39, 57, 0.8);
  transition: 0.4s;
}

.mobile-nav * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.mobile-nav a {
  display: block;
  position: relative;
  color: #fff;
  padding: 10px 20px;
  font-weight: 500;
}

.mobile-nav a:hover,
.mobile-nav .active > a,
.mobile-nav li:hover > a {
  color: #74b5fc;
  text-decoration: none;
}

.mobile-nav .drop-down > a:after {
  content: "\f078";
  font-family: FontAwesome;
  padding-left: 10px;
  position: absolute;
  right: 15px;
}

.mobile-nav .active.drop-down > a:after {
  content: "\f077";
}

.mobile-nav .drop-down > a {
  padding-right: 35px;
}

.mobile-nav .drop-down ul {
  display: none;
  overflow: hidden;
}

.mobile-nav .drop-down li {
  padding-left: 20px;
}

.mobile-nav-toggle {
  position: fixed;
  right: 0;
  top: 0;
  z-index: 9998;
  border: 0;
  background: none;
  font-size: 24px;
  transition: all 0.4s;
  outline: none !important;
  line-height: 1;
  cursor: pointer;
  text-align: right;
}

.mobile-nav-toggle i {
  margin: 18px 18px 0 0;
  color: #004289;
}

.mobile-nav-overly {
  width: 100%;
  height: 100%;
  z-index: 9997;
  top: 0;
  left: 0;
  position: fixed;
  background: rgba(19, 39, 57, 0.8);
  overflow: hidden;
  display: none;
}

.mobile-nav-active {
  overflow: hidden;
}

.mobile-nav-active .mobile-nav {
  left: 0;
}

.mobile-nav-active .mobile-nav-toggle i {
  color: #fff;
}

li:hover ul, li.sfhover ul { display: block }

/*--------------------------------------------------------------
# Job Available Section
--------------------------------------------------------------*/

.wrapper{
  padding-top: 30px;
}

.job-search{
    background:#f2f2f2;
    padding: 30px;
}

.alert{
  background: black;
  color: #fff;
}

.search-filters{
  background: #074995 ;
  color: #fff;
  padding: 20px;
}

.job-search .job-item{
  margin-bottom: 20px;
  box-shadow: 0 0 5px rgba(0,0,0,0.2);
}

.card-header{
    background: #151f42;
    color:#d9d9d9;
}

.header-wrap{
  margin: 15px;
}

.job-search .job-item .card-body{
  padding: 20px;
  color:#333;
}

.job-search .job-item .job-title{
  font-weight: 600;
  font-size: 28px;
  color: #074995; 
}

.company-logo{
  padding: 60px;
  width: 300px;
  position: relative;
}

.job-search .job-item , .job-search .job-item .company-description{
  font-family: "Montserrat", sans-serif;
  padding-top: 15px;
  font-size: 15px;
}
.company-name{
  font-size: 20px;
  font-weight: bold;
  color: #f75e22;
}

.company-date{
  font-style: "arial";
  font-weight: 600;
  font-size: 12px;
  color: red;
}

.job-search .job-item .job-availability{
  font-size: 13px;
  padding-top: 10px;
  color: red;
}

.pagination-container{
  margin: 15px;
}

.job-search .row:not(:first-child){
  margin-top: 20px;
}

.btn-primary{
  position: relative; 
  padding: 10px;
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
  border-width: 3px;
}

.btn-primary-search{
  position: relative;   
  background-color: #2176FF  ;
  border-width: 3px;
  margin: 30px;
  color: #fff;
}

/* events Section
--------------------------------*/
#events {
  padding: 60px 0;
}

#events #events-flters {
  padding: 0;
  margin: 5px 0 35px 0;
  list-style: none;
  text-align: center;
}

#events #events-flters li {
  cursor: pointer;
  margin: 15px 15px 15px 0;
  display: inline-block;
  padding: 10px 20px;
  font-size: 12px;
  line-height: 20px;
  color: #666666;
  border-radius: 4px;
  text-transform: uppercase;
  background: #fff;
  margin-bottom: 5px;
  transition: all 0.3s ease-in-out;
}

#events #events-flters li:hover, #events #events-flters li.filter-active {
  background: #18d26e;
  color: #fff;
}

#events #events-flters li:last-child {
  margin-right: 0;
}

#events .events-wrap {
  box-shadow: 0px 2px 12px rgba(0, 0, 0, 0.08);
  transition: 0.3s;
}

#events .events-wrap:hover {
  box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.16);
}

#events .events-item {
  position: relative;
  height: 360px;
  overflow: hidden;
}

#events .events-item figure {
  background: #000;
  overflow: hidden;
  height: 240px;
  position: relative;
  border-radius: 4px 4px 0 0;
  margin: 0;
}

#events .events-item figure:hover img {
  opacity: 0.4;
  transition: 0.3s;
}

#events .events-item figure .link-preview, #events .events-item figure .link-details {
  position: absolute;
  display: inline-block;
  opacity: 0;
  line-height: 1;
  text-align: center;
  width: 36px;
  height: 36px;
  background: #fff;
  border-radius: 50%;
  transition: 0.2s linear;
}

#events .events-item figure .link-preview i, #events .events-item figure .link-details i {
  padding-top: 6px;
  font-size: 22px;
  color: #333;
}

#events .events-item figure .link-preview:hover, #events .events-item figure .link-details:hover {
  background: #151f42;
}

#events .events-item figure .link-preview:hover i, #events .events-item figure .link-details:hover i {
  color: #fff;
}

#events .events-item figure .link-preview {
  left: calc(50% - 38px);
  top: calc(50% - 18px);
}

#events .events-item figure .link-details {
  right: calc(50% - 38px);
  top: calc(50% - 18px);
}

#events .events-item figure:hover .link-preview {
  opacity: 1;
  left: calc(50% - 44px);
}

#events .events-item figure:hover .link-details {
  opacity: 1;
  right: calc(50% - 44px);
}

#events .events-item .events-info {
  background-color: #f75e22 ;
  text-align: left;
  padding: 30px;
  height: 90px;
  border-radius: 0 0 6px 6px;
}

#events .events-item .events-info h4 {
  text-align: left;
  font-size: 20px;
  line-height: 1px;
  font-weight: 700;
  margin-bottom: 18px;
  padding-bottom: 0;
}

#events .events-item .events-info h4 a {
  text-align: left;
  color: #fff;
}

#events .events-item .events-info h4 a:hover {
  text-align: left;
  color: #ffd11a;
}

#events .events-item .events-info p {
  text-align: left;
  padding: 0;
  margin: 0;
  color: #f2f2f2;
  font-weight: 500;
  font-size: 14px;
  text-transform: capitalize;
}


/*--------------------------------------------------------------
# Sections
--------------------------------------------------------------*/

/* Sections Header
--------------------------------*/

.section-header h3 {
  font-size: 36px;
  color: #074995 ;
  text-align: center;
  font-weight: 500;
  position: relative;
}

.section-header h2 {
  font-size: 36px;
  color: #f75e22  ;
  text-align: center;
  font-weight: 400;
  position: relative;
}

.section-header p {
  text-align: center;
  margin: auto;
  font-size: 15px;
  padding-bottom: 60px;
  color: #3f4e5a;
  width: 70%;
}

.section-header .portfolio-header{

}

/* Section with background
--------------------------------*/

.section-bg {
  background: #ecf5ff;
}

/* About Us Section
--------------------------------*/

#about {
  background: #fff;
  padding: 60px 0;
}

#about .about-container .background {
  margin: 20px 0;
}

#about .about-container .content {
  background: #fff;
}

#about .about-container .title {
  color: #333;
  font-weight: 700;
  font-size: 32px;
}

#about .about-container p {
  line-height: 26px;
}

#about .about-container p:last-child {
  margin-bottom: 0;
}

#about .about-container .icon-box {
  background: #fff;
  background-size: cover;
  padding: 0 0 30px 0;
}

#about .about-container .icon-box .icon {
  float: left;
  background: #fff;
  width: 64px;
  height: 64px;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  text-align: center;
  border-radius: 50%;
  border: 2px solid #007bff;
  transition: all 0.3s ease-in-out;
}

#about .about-container .icon-box .icon i {
  color: #007bff;
  font-size: 24px;
}

#about .about-container .icon-box:hover .icon {
  background: #007bff;
}

#about .about-container .icon-box:hover .icon i {
  color: #fff;
}

#about .about-container .icon-box .title {
  margin-left: 80px;
  font-weight: 600;
  margin-bottom: 5px;
  font-size: 18px;
}

#about .about-container .icon-box .title a {
  color: #283d50;
}

#about .about-container .icon-box .description {
  margin-left: 80px;
  line-height: 24px;
  font-size: 14px;
}

#about .about-extra {
  padding-top: 60px;
}

#about .about-extra h4 {
  font-weight: 600;
  font-size: 24px;
}


/* Portfolio Section
--------------------------------*/

#portfolio {
  background-color: #fff;
  padding: 60px 0;
  box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
}

#portfolio #portfolio-flters {
  padding: 0;
  margin: 5px 0 35px 0;
  list-style: none;
  text-align: center;
}

#portfolio #portfolio-flters li {
  cursor: pointer;
  margin: 15px 15px 15px 0;
  display: inline-block;
  padding: 6px 20px;
  font-size: 12px;
  line-height: 20px;
  color: #074995 ;
  border-radius: 50px;
  text-transform: uppercase;
  background: #074995 ;
  margin-bottom: 5px;
  transition: all 0.3s ease-in-out;
}

#portfolio #portfolio-flters li:hover,
#portfolio #portfolio-flters li.filter-active {
  background: #074995;
  color: #fff;
}

#portfolio #portfolio-flters li:last-child {
  margin-right: 0;
}

#portfolio .portfolio-item {
  position: relative;
  overflow: hidden;
  margin-bottom: 30px;
}

#portfolio .portfolio-item .portfolio-wrap {
  overflow: hidden;
  position: relative;
  border-radius: 6px;
  margin: 0;
}

#portfolio .portfolio-item .portfolio-wrap:hover img {
  opacity: 0.4;
  transition: 0.3s;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  text-align: center;
  opacity: 0;
  transition: 0.2s linear;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 {
  font-size: 22px;
  line-height: 1px;
  font-weight: 700;
  margin-bottom: 14px;
  padding-bottom: 0;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 a {
  color: #fff;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info h4 a:hover {
  color: #007bff;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info p {
  padding: 0;
  margin: 0;
  color: #e2effe;
  font-weight: 500;
  font-size: 14px;
  text-transform: uppercase;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview,
#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details {
  display: inline-block;
  line-height: 1;
  text-align: center;
  width: 36px;
  height: 36px;
  background: #007bff;
  border-radius: 50%;
  margin: 10px 4px 0 4px;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview i,
#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details i {
  padding-top: 6px;
  font-size: 22px;
  color: #fff;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview:hover,
#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details:hover {
  background: #3395ff;
}

#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-preview:hover i,
#portfolio .portfolio-item .portfolio-wrap .portfolio-info .link-details:hover i {
  color: #fff;
}

#portfolio .portfolio-item .portfolio-wrap:hover {
  background: #003166;
}

#portfolio .portfolio-item .portfolio-wrap:hover .portfolio-info {
  opacity: 1;
}



</style>