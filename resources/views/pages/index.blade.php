@extends('layouts.headlayout')
@section('content')

<style>
  .mt1 {
    margin-top: 60px;
  }

  /*search box css start here*/
  .search-sec {
    padding: 2rem;
    z-index: 1;
    margin-top: -1.8%;
    margin-bottom: -8%;
  }

  .search-slt {
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius: 0;
  }

  .wrn-btn {
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius: 0;
  }

  @media (min-width: 992px) {
    .search-sec {
      position: relative;
      top: -114px;
      background: rgba(26, 70, 104, 0.51);
    }
  }

  @media (max-width: 992px) {
    .search-sec {
      background: #1A4668;
    }
  }
</style>

<section>
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://pbs.twimg.com/media/EGHYvtjU0AAO8w1?format=jpg&name=large" class="d-block w-100" alt="...">
      </div>
      <!--https://upload.wikimedia.org/wikipedia/commons/8/8d/Yarra_Night_Panorama%2C_Melbourne_-_Feb_2005.jpg-->
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
<section class="search-sec">
  <div class="container">
    <form action="#" method="post" novalidate="novalidate">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <input type="text" class="form-control search-slt" placeholder="Enter Pickup City">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <select class="form-control search-slt" id="exampleFormControlSelect1">
                <option>Select Vehicle</option>
                <option>Example one</option>
              </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
              <button type="button" class="btn btn-danger wrn-btn">Search</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<!-- Page Content -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="text-center">NotifyMe! WebApp</h2>
    <p class="text-muted mb-5 text-center">There are many variations of passages of Lorem Ipsum available, but the
      majority have suffered alteration in some form.</p>
    <div class="row">
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-danger fa fa-heart mb-2">
        </i>
        <h6>Ex cupidatat eu</h6>
        <p class="text-muted">Ex cupidatat eu officia consequat incididunt labore occaecat ut veniam labore et cillum id
          et.</p>
      </div>
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-secondary fab fa-adobe mb-2">
        </i>
        <h6>Tempor aute occaecat</h6>
        <p class="text-muted">Tempor aute occaecat pariatur esse aute amet.</p>
      </div>
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-primary fa fa-address-book mb-2"></i>
        <h6>Voluptate ex irure</h6>
        <p class="text-muted">Voluptate ex irure ipsum ipsum ullamco ipsum reprehenderit non ut mollit commodo.</p>
      </div>
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-secondary fab fa-amazon mb-2"></i>
        <h6>Tempor commodo</h6>
        <p class="text-muted">Tempor commodo nostrud ex Lorem occaecat duis occaecat minim.</p>
      </div>
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-success fab fa-android mb-2"></i>
        <h6>Et fugiat sint occaecat</h6>
        <p class="text-muted">Et fugiat sint occaecat voluptate incididunt anim nostrud ea cillum cillum consequat.</p>
      </div>
      <div class="col-sm-6 col-lg-4 mb-3">
        <i style="font-size:80px;" class="lnr text-danger fab fa-angular mb-2"></i>
        <h6>Et labore tempor et</h6>
        <p class="text-muted">Et labore tempor et adipisicing dolor.</p>
      </div>
    </div>
  </div>
</section>
<section class="main">
  <div class="container mt-4">
    <h1 class="text-center mb-4 p-4 text-secondary">From The Blog</h1>
    <div class="row">

      <div class="card-columns">
        <div class="card shadow border-0">
          <img class="card-img-top"
            src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg"
            alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title that wraps to a new line</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
          </div>
        </div>
        <div class="card shadow border-0  p-3">
          <blockquote class="blockquote mb-0 card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">
              <small class="text-muted">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card shadow border-0">
          <img class="card-img-top"
            src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg"
            alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card shadow border-0 bg-primary text-white text-center p-3">
          <blockquote class="blockquote mb-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
            <footer class="blockquote-footer">
              <small>
                Someone famous in <cite title="Source Title">Source Title</cite>
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card shadow border-0 text-center">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card shadow border-0">
          <img class="card-img"
            src="https://4.bp.blogspot.com/-InDD3Hm_bhU/XB4_TK3TT7I/AAAAAAAAAJ4/r5tUeCOqq1MTchFh7D7pWdf582A4qYIIwCEwYBhgL/s1600/Businesswoman-working-at-a-computer-1280x720.jpg"
            alt="Card image">
        </div>
        <div class="card shadow border-0 p-3 text-right">
          <blockquote class="blockquote mb-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer class="blockquote-footer">
              <small class="text-muted">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card shadow border-0">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is another card with title and supporting text below. This card has some
              additional content to make it slightly taller overall.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Header -->
<header class="bg-primary text-center py-5 mb-4">
  <div class="container">
    <h1 class="font-weight-light text-white">Meet the Team</h1>
  </div>
</header>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 4 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Team Member</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
  </div>
</div><br><br>
@endsection
<footer id="footer"></footer>
@extends('layouts.footer')