<div class="row profile-bg-wrapper">
  <div class="container">
      <div class="test0 col-sm-12">New Post</div>
        <div class="container">
        <ul class="rtabs">
            <li><a href="#view1">Deal</a></li>
            <li @if(Session::has('tab') && Session::get('tab') == 'article') class="selected" @endif><a href="#view2">Article</a></li>
        </ul>
        <div class="panel-container">
            <div id="view1">
              <div class="row">
                <div class="container">
                  <div class="panel panel-default">
                    <div class="row">
                      <div class="container4">
                        <h3 class="article-submission">Article Submission Hints</h3>
                        <div class="row">
                          <div class="col-sm-12">
                            <p class="simple">Here's some useful information to provide your submission:</p>
                            <ol class="test1">
                              <p>1.  Write a creative title that sums up what the article is about. Keep it factual and opinion-free. You can post your opinion in the comments section.</p>
                              <p>2.  While it is optional, it may be a good idea to write a brief summary of the article in your own words.</p>
                              <p>3.  Make sure the article is relevant to our site. Use common sense. Here's some some examples: interesting news, new technologies,breakthrough studies, knowledge that helps improve our life and health, healthy recipes, eco-friendly living, etc.</p>
                              <p>4.  Please make sure to read the article in depth and make sure it's not a article written by a satire website.</p>
                              <p>5.  If you post a link to a study, make sure it's not a hypothesis and that it offers valuable insight</p>
                              <p>6.  Keep it appropriate. Use common sense and avoid explicit and non-relevant content.</p>
                              <p>7.  Make sure to link to the original source of content. Link to the direct url, not the index of a blog or website.</p>
                              <p>8.  Use proper grammar when including text</p>
                              <p>9.  Don't submit spammy links that may contain malware, ad spam, product sales and otherwise low quality content and user experience</p>
                            </ol>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="row">
                  <form action="/deal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container3 {{ $errors->has('title') ? ' has-error' : '' }}">
                      <h3 class="article-submission">Title:</h3>
                      <input class="title1" type="text" name="title" value="{{ old('title') }}"/>
                      @if ($errors->has('title'))
                          <span class="help-block">
                              <strong>{{ $errors->first('title') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="container5 {{ $errors->has('message') ? ' has-error' : '' }}">
                      <h3 class="article-submission">Message:</h3>
                      <input class="text-optional" type="text" name="message" value="{{ old('message') }}" />
                      @if ($errors->has('message'))
                          <span class="help-block">
                              <strong>{{ $errors->first('message') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="container3 {{ $errors->has('price') ? ' has-error' : '' }}">
                      <h3 class="article-submission">Final Price:<span>For single items, what is the final price after the savings?</span></h3>
                      <input class="title2" type="text" name="price" value="{{ old('price') }}" />
                      @if ($errors->has('price'))
                          <span class="help-block">
                              <strong>{{ $errors->first('price') }}</strong>
                          </span>
                      @endif
                    </div>
                    <div class="container {{ $errors->has('price_type') ? ' has-error' : '' }}">
                      <div class="right-button1">
                        <input class="checkbox1" type="checkbox" name="price_type" value="free_shoping"> <span>FREE SHOPING</span>
                        <input class="checkbox1" type="checkbox" name="price_type" value="free_in_store" checked> <span>FREE IN-STORE</span>
                        @if ($errors->has('price_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price_type') }}</strong>
                            </span>
                        @endif
                      </div>
                  </div>
                </div>
                  <div class="container5">
                      <h3 class="article-submission">Images:<span>Drag and drop images (maximum of 3, square images will look best) below</span></h3>
                      <img id="imgUploadBtn1" class="image1" src="/assets/front/images/drag-n-drop.jpg" />
                      <input type="file" name="product_image" style="display:none;">
                  </div>
                  <div class="container3 {{ $errors->has('store_name') ? ' has-error' : '' }}">
                      <h3 class="article-submission">Store Name:</h3>
                      <input class="title2" type="text" name="store_name" value="{{ old('store_name') }}" />
                      @if ($errors->has('store_name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('store_name') }}</strong>
                          </span>
                      @endif
                   </div>
                   <div class="container3">
                      <h3 class="article-submission">Link:<span>No affiliate links. Post the links in your description first. This link will be embedded in the "See Deal" button.</span></h3>
                      <input class="title1" type="text" name="link" value="{{ old('link') }}" />
                  </div>
                  <div class="container3">
                      <p class="test3"><a>A moderator will review this post. Please make sure you follow the rules and the hints above.</a></p>
                  </div>
                  <div class="container3">
                    <input class="button7" type="submit" name="btn" value="SUBMIT" />
                  </div>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
            <div id="view2">
              <div class="panel panel-default">
                <div class="row">
                  <div class="container4">
                    <h3 class="article-submission">Article Submission Hints</h3>
                    <div class="row">
                      <div class="col-sm-12">
                        <p class="simple">Here's some useful information to provide your submission:</p>
                        <ol class="test1">
                          <li>Write a creative title that sums up what the article is about. Keep it factual and opinion-free. You can post your opinion in the comments section.</li>
                          <li> While it is optional, it may be a good idea to write a brief summary of the article in your own words.</li>
                          <li>Make sure the article is relevant to our site. Use common sense. Here's some some examples: interesting news, new technologies,breakthrough studies, knowledge that helps improve our life and health, healthy recipes, eco-friendly living, etc.</li>
                          <li>Please make sure to read the article in depth and make sure it's not a article written by a satire website.</li>
                          <li>If you post a link to a study, make sure it's not a hypothesis and that it offers valuable insight</li>
                          <li>Keep it appropriate. Use common sense and avoid explicit and non-relevant content.</li>
                          <li>Make sure to link to the original source of content. Link to the direct url, not the index of a blog or website.</li>
                          <li>Use proper grammar when including text</li>
                          <li>Don't submit spammy links that may contain malware, ad spam, product sales and otherwise low quality content and user experience</li>
                        </ol>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <form  action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="container3">
                      @include('errors.validation')
                    </div>
                    <div class="container3">
                      <h3 class="article-submission">Title</h3>
                      <input class="title1" type="text" name="title" value="{{ old('title')}}"/>
                    </div>
                    <div class="container5">
                      <h3 class="article-submission">Text(optional):</h3>
                      <textarea class="text-optional" name="post">{{ old('post')}}</textarea>
                    </div>
                    <div class="container3">
                      <h3 class="article-submission">Article link:<span>Source of the article.</span></h3>
                      <input class="title1" type="text" name="article_source" value="{{ old('article_source') }}"/>
                    </div>
                    <div class="container5">
                      <h3 class="article-submission">Images:<span>Drag and drop images (maximum of 3, square images will look best) below</span></h3>
                      <img class="image1" id="imgUploadBtn" src="/assets/front/images/drag-n-drop.jpg" />
                      <input type="file" name="thumbnail_image" class="form-control input-lg" placeholder="Title" tabindex="1" style="display:none;">
                    </div>

                    <div class="container3">
                      <p class="test3"><a>A moderator will review this post. Please make sure you follow the rules and the hints above.</a></p>
                    </div>
                    <div class="container3">
                      <input class="button7" type="submit" name="type" value="post" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
