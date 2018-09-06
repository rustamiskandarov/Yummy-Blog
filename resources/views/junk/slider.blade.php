@if(count($sliders) > 0)
    <section class="welcome-post-sliders owl-carousel">
        @foreach($sliders as $slide)
        <!-- Single Slide -->
            <div class="welcome-single-slide">
                <!-- Post Thumb -->
                <img src="{{$slide->image}}" alt="">
                <!-- Overlay Text -->
                <div class="project_title">
                    <div class="post-date-commnents d-flex">
                        <a href="#">May 19, 2017</a>
                        <a href="#">{{$slide->title}}</a>
                    </div>
                    <a href="#">
                        <h5>{{$slide->content}}</h5>
                    </a>
                </div>
            </div>
        @endforeach
    </section>
    <!-- ****** Welcome Area End ****** -->
@endif