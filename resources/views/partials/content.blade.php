<div class="card" style="width: 18rem;">
  <img src="{{ Utilities::global_thumbnails(get_the_ID(), 'full') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{!! get_the_title() !!}</h5>
    <p class="card-text">@php the_excerpt() @endphp</p>
    <a href="{{ get_permalink() }}" class="btn btn-primary">Go somewhere</a>
  </div>
</div>