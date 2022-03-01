@extends('site.master')
<style>
    span.form-validation {
        font-size: 11px;
    }

</style>
@section('contenido')
    <!-- Breadcrumbs -->
    <section class="section section-bredcrumbs"
        style="background: url(https://images.unsplash.com/photo-1468164016595-6108e4c60c8b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80) no-repeat center / cover">
        <div class="container context-dark breadcrumb-wrapper text-left">
            <h1>Artículo</h1>
            <ul class="breadcrumbs-custom">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="active">Artículo</li>
            </ul>
        </div>
    </section>
    <section class="section section-lg bg-default">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10 col-xl-8">
              <div class="post-single-wrap">
                <div class="post-item">
                  <h2>DJ Aaron Wilson Visits LA Club with His Biggest Set</h2>
                  <ul class="list-dotted">
                    <li>
                      <div class="post-author">
                        <div class="media-wrap"><img src="{{ asset('onwave/images/single-post-author-1-48x48.jpg')}}" alt="" width="48" height="48">
                        </div>
                        <div class="author-name">Martha Ryan</div>
                      </div>
                    </li>
                    <li>
                      <div class="post-time">June, 16 2018 at 2:12 pm</div>
                    </li>
                    <li>
                      <div class="post-tag">News</div>
                    </li>
                  </ul>
                  <div class="subtitle heading-6">Vitae purus faucibus ornare suspendisse sed nisi lacus. Quis auctor elit sed vulputate. Nibh cras pulvinar mattis nunc sed blandit libero.</div><img class="img-bordered" src="{{ asset('onwave/images/single-post-1-770x472.jpg"')}} alt="" width="770" height="472">
                  <p>Dapibus ultrices in iaculis nunc sed augue. Amet cursus sit amet dictum sit. Vel pharetra vel turpis nunc eget lorem dolor sed. Diam sollicitudin tempor id eu nisl nunc mi. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque.</p>
                  <blockquote class="quote quote-default">
                    <div class="quote-icon mdi mdi-format-quote accent-quote"></div>
                    <div class="quote-body">
                      <q class="heading-6">Sagittis id consectetur purus ut faucibus pulvinar elementum integer. Diam vel quam elementum pulvinar etiam non quam lacus. Quis varius quam quisque id. Odio eu feugiat pretium nibh ipsum consequat nisl vel pretium.</q>
                    </div>
                  </blockquote>
                  <p>At eos omnium option disputando, eius nusquam quo at. Ad sit modo nemore diceret, in vel vidit dicat. Eam fierent neglegentur ea. Delectus volutpat at sit, cum etiam copiosae an. Vim in illud nonumy malorum. Nemore democritum cu eos, quo etiam volumus id. Eripuit corrumpit ei quo.</p>
                  <p>In summo assentior consetetur qui, ea per dolor erroribus expetendis. Causae audire cu est. Quodsi meliore mei ea, at odio euismod pro. Ad mundi indoctum sit. Vel meis instructior in, discere habemus eu usu. Ne eam quas saperet, cu vix homero recteque, no mea eripuit sadipscing.</p><img class="img-bordered" src="{{ asset('onwave/images/single-post-2-770x472.jpg')}}" alt="" width="770" height="472">
                  <p>Non enim praesent elementum facilisis. Ac tortor dignissim convallis aenean et tortor at risus viverra. In fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Habitant morbi tristique senectus et netus et malesuada. Libero enim sed faucibus turpis in. Volutpat ac tincidunt vitae semper quis. Tortor vitae purus faucibus ornare suspendisse sed</p>
                  {{-- <div class="group-sm buttons-group-1"><a class="button button-icon button-icon-left button-round button-facebook" href="#"><span class="icon mdi mdi-facebook"></span><span>Share on Facebook</span></a><a class="button button-icon button-icon-left button-round button-twitter" href="#"><span class="icon mdi mdi-twitter"></span><span>Share on Twitter</span></a></div> --}}
                </div>
                {{-- <div class="post-item">
                  <h2>Comments</h2>
                  <ul class="comment-list">
                    <li>
                      <div class="box-comment">
                        <div class="box-comment-image"><img src="{{ asset('onwave/images/single-post-comment-1-70x70.jpg')}}" alt="" width="70" height="70">
                        </div>
                        <div class="box-comment-body">
                          <div class="title">Harold Brown</div>
                          <div class="date">June, 16 2018 at 2:48 pm</div>
                          <div class="comment">Quam vulputate dignissim suspendisse in est ante in nibh. Scelerisque purus semper eget duis at tellus at urna. Hac habitasse platea dictumst vestibulum rhoncus est.</div><a class="comment-link" href="#">Reply</a>
                        </div>
                      </div>
                      <ul class="comment-list-reply">
                        <li>
                          <div class="box-comment">
                            <div class="box-comment-image"><img src="{{ asset('onwave/images/single-post-comment-2-70x70.jpg')}}" alt="" width="70" height="70">
                            </div>
                            <div class="box-comment-body">
                              <div class="title">Martha Ryan</div>
                              <div class="date">June, 16 2018 at 2:48 pm</div>
                              <div class="comment">Aliquam sem et tortor consequat id. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Dui sapien eget mi proin sed libero enim sed. Odio morbi quis commodo odio aenean sed adipiscing. Nisl purus in mollis nunc sed id semper risus.</div><a class="comment-link" href="#">Reply</a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <div class="box-comment">
                        <div class="box-comment-image"><img src="{{ asset('onwave/images/single-post-comment-3-70x70.jpg')}}" alt="" width="70" height="70">
                        </div>
                        <div class="box-comment-body">
                          <div class="title">Melissa Wagner</div>
                          <div class="date">June, 16 2018 at 2:48 pm</div>
                          <div class="comment">Id consectetur purus ut faucibus pulvinar elementum integer. In est ante in nibh mauris cursus mattis molestie a. Elementum nisi quis eleifend quam adipiscing vitae proin sagittis.</div><a class="comment-link" href="#">Reply</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div> --}}
                {{-- <div class="post-item">
                  <h2>Leave a Comment</h2>
                  <form class="rd-form rd-mailform comment-form" novalidate="novalidate">
                    <div class="row row-15">
                      <div class="col-md-6">
                        <div class="form-wrap">
                          <input class="form-input form-control-has-validation" id="contact-name" type="text" name="name" data-constraints="@Required"><span class="form-validation"></span>
                          <label class="form-label rd-input-label" for="contact-name">Name</label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-wrap">
                          <input class="form-input form-control-has-validation" id="contact-email" type="email" name="email" data-constraints="@Email @Required"><span class="form-validation"></span>
                          <label class="form-label rd-input-label" for="contact-email">E-mail</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-wrap">
                          <label class="form-label rd-input-label" for="contact-message">Message</label>
                          <textarea class="form-input form-control-has-validation form-control-last-child" id="contact-message" name="message" data-constraints="@Required"></textarea><span class="form-validation"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <button class="button button-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
