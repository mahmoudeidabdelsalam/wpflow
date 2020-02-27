<!-- Popup it self -->
<div id="search" class="white-popup mfp-with-anim mfp-hide search-box">
  <div class="search-box slideInUp">
    <main class="main-wrap mt-5">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-12 col-sm-12 col-xs-12 m-auto">
            <form class="search-form" action="{{ bloginfo('url') }}">
              <div class="input-group col-12 p-0">
                <input id="autocomplete" class="search-input form-control" name="s" value="{{ get_search_query() }}" type="search" placeholder="{{ _e('type to search...','builder') }}" autocomplete="off" spellcheck="false" maxlength="100">
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
