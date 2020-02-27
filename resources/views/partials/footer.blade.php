<!-- Site footer -->
<footer class="site-footer bg-light pt-5 pb-2">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-6 text-center">
        <a class="navbar-brand mb-4" href="{{ home_url('/') }}" title="{{ get_bloginfo('name') }}">
          <img class="img-fluid" src="@if(get_field('website_logo', 'option')) {{ the_field('website_logo','option') }} @else {{ get_theme_file_uri().'/dist/images/logo.png' }} @endif" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name') }}"/>
          <span class="sr-only"> {{ get_bloginfo('name') }} </span>
        </a>
        <p class="text-secondary"><?php _e("Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,", "qteam"); ?></p>
      </div>
      <div class="col-md-12 text-center">
        <ul class="list-inline">
          <li class="list-inline-item">
            <a class="text-silver" href="#"><i class="fa fa-mobile"></i> (+202)23824195–23824196</a>
          </li>
          <li class="list-inline-item">
            <a class="text-silver" href="#"><i class="fa fa-envelope"></i> info-qteam@qteam.io</a>
          </li>
        </ul>
        <ul class="social-icons text-center">
          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
        </ul>
      </div>
    </div>
  </div>
  <hr>
  <section class="copyright"> 
    <div class="col-md-12 text-center">
      <p class="text-silver">Copyright &copy; 2017 All Rights Reserved by 
      <a href="#">QTeam</a>.
      </p>
    </div>
  </section>  
</footer>
