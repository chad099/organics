<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-10">
      <form role="form" action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
        @include('errors.validation')
        <h2>Post Edit</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $post->id }}">
        <hr class="">
        <div class="row">

          <div class="">
            <div class="form-group">
              <input type="text" name="title" value="{{ $post->title}}" id="title" class="form-control input-lg" placeholder="Title" tabindex="1">
            </div>
            <div class="form-group">
              <textarea name="post" id="post">{{ $post->post}}</textarea>
            </div>
            <div class="form-group">
              <input type="file" name="thumbnail_image" class="form-control input-lg" placeholder="Title" tabindex="1">
              <br/>
              <div class="image-thumbnail">
                <img src="/assets/post/images/{{ $post->thumbnail_image}}"></img>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-4"><input type="submit" value="saved" name="type" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
            <div class="col-xs-12 col-md-4">
              <a href="/admin/posts/{{ $post->id }}/approve" class="btn btn-success btn-block btn-lg" tabindex="7">Approve</a>
            </div>
            <div class="col-xs-12 col-md-4">
              <a href="/admin/posts/{{ $post->id }}/delete" class="btn btn-danger btn-block btn-lg" tabindex="7">Delete</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
