    <div class="col-md-2">  
       <nav class="navbar navbar-expand-lg navbar-light bg-light" style="flex-direction: column">
      <a class="navbar-brand" href="{{route('home')}}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="display:flex; flex-direction: column">
          <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}"><i class="fa fa-list-ul" aria-hidden="true"></i> Danh mục phim</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('genre.index')}}"><i class="fa fa-file-video-o" aria-hidden="true"></i> Thể loại</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('country.index')}}"><i class="fa fa-globe" aria-hidden="true"></i> Quốc gia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('movie.index')}}"><i class="fa fa-film" aria-hidden="true"></i></i> Phim</a>
          </li>
          <li class="nav-item">
            </i><a class="nav-link" href="{{route('episode.index')}}"><i class="fa fa-video-camera" aria-hidden="true"></i> Tập phim</a>
          </li>
        </ul>
        
      </div>
    
  </nav>
        </div>  