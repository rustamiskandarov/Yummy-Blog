@if(count($portfolios)>0)
    <div class="row">
        <h2>{{trans('ru.latest_project')}}</h2>
    </div>
    <!-- Single Post -->
    <div class="row">
        @foreach($portfolios as $k=>$item)
            @if($k==0)
                <!-- Single Post -->
                    <div class="col-12">
                        <div class="single-post wow fadeInUp" data-wow-delay=".2s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="/img/portfolio-img/{{$item->image->max}}" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#">By Marian</a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#">May 19, 2017</a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <h2 class="post-headline">{{str_limit($item->title, 20)}}</h2>
                                </a>
                                <p>{{$item->content}}</p>
                                <a href="{--{route('portfolio.show', ['alias' => $item->alias])}--}" class="read-more">Continue Reading..</a>
                                    <a href="#">
                                        <h5>
                                            {{$item->filter->title}}
                                        </h5>
                                    </a>
                            </div>
                        </div>
                    </div>
                @continue
            @endif
            <div class="col-12 col-md-6">
            <div class="single-post wow fadeInUp" data-wow-delay=".4s">
                <!-- Post Thumb -->
                <div class="post-thumb">
                    <img src="/img/portfolio-img/{{$item->image->mini}}" alt="">
                </div>
                <!-- Post Content -->
                <div class="post-content">
                    <div class="post-meta d-flex">
                        <div class="post-author-date-area d-flex">
                            <!-- Post Author -->
                            <div class="post-author">
                                <a href="#">By Marian</a>
                            </div>
                            <!-- Post Date -->
                            <div class="post-date">
                                <a href="#">May 19, 2017</a>
                            </div>
                        </div>
                        <!-- Post Comment & Share Area -->
                        <div class="post-comment-share-area d-flex">
                            <!-- Post Favourite -->
                            <div class="post-favourite">
                                <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 10</a>
                            </div>
                            <!-- Post Comments -->
                            <div class="post-comments">
                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 12</a>
                            </div>
                            <!-- Post Share -->
                            <div class="post-share">
                                <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <h4 class="post-headline">{{$item->content}}</h4>
                    </a>
                    <a href="#">
                        <h6>
                            {{$item->filter->title}}
                        </h6>
                    </a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
@endif