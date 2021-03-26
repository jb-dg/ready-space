 <!-- Masthead -->
  <header class="masthead text-white text-center" style=" background: url('../img/masthead.jpg') no-repeat center center;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Proposez ou trouvez des services tout simplement !</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
         <form class="form-row" action="{{ route('posts.search') }}" >
          <input name="q" class="form-control col-10 @error('q') is-invalid @enderror" value="{{ request()->q ?? '' }}" type="text" placeholder="Rechercher" required>

          <button type="submit" class="btn btn-primary mx-2 mx-sm-2 mx-md-1 mx-lg-1 mx-xl-1">
				      <span class="fa fa-search" aria-hidden="true"></span>
          </button> 
         @error('q')
            <span class="invalid-feedback" role="alert">
                <strong>
                  {{ $message }}
              </strong>
            </span>
          @enderror
      </form>
        </div>
      </div>
    </div>
  </header>
