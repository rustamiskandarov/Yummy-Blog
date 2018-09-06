@if(count($articles)>0)
    <div class="row">
        <h2>{{trans('ru.from_blog')}}</h2>
    </div>
    <!-- Single Post -->
    <div class="row">
        @foreach($articles as $k=>$item)
            <!-- Single Post -->
                <div class="col-12">
                    <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay=".2s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <img src="/img/post-img/{{$item->image->max}}" alt="">
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
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> {{count($item->comment) ? count($item->comment) : '0'}}</a>
                                    </div>
                                    <!-- Post Share -->
                                    <div class="post-share">
                                        <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('articles.show', ['slug'=>$item->slug])}}">
                                <h4 class="post-headline">{{str_limit($item->title, 20)}}</h4>
                            </a>
                            <p>{{str_limit($item->content, 200)}}</p>
                            <p>{{$item->category->title}}</p>
                            <a href="#" class="read-more">Continue Reading..</a>

                        </div>
                    </div>
                </div>


        @endforeach
    </div>
    {{$articles->links()}}
@endif