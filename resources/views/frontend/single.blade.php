@extends('frontend.layout.app')


@section('content')
    <section class="unpad">
        <article>
            <div class="imagebg text-center height-60" data-overlay="5">
                <div class="background-image-holder">
                    <img alt="background" src="{{ asset('uploads/'.$post->image) }}" />
                </div>
                <div class="container pos-vertical-center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="article__title">
                                <h1>{{ $post->title }}</h1>
                                <span>{{ $post->created_at->format('d M Y, h:i') }} in</span>
                                <span>
                                    <a href="#">{{ $post->category->title }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
                <div class="pos-absolute pos-bottom col-12 text-center">
                    <div class="article__author">
                        <img alt="Image" src="{{ asset('uploads/'.$post->user->image) }}" />
                        <h6 class="type--uppercase">{{ $post->user->name }}</h6>
                    </div>
                </div>
            </div>
            <div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <div class="article__body">
                                {!! $post->content !!}
                            </div>
                            {{-- <div class="article__share text-center">
                                <a class="btn bg--facebook btn--icon" href="#">
                                    <span class="btn__text">
                                        <i class="socicon socicon-facebook"></i>
                                        Share on Facebook
                                    </span>
                                </a>
                                <a class="btn bg--twitter btn--icon" href="#">
                                    <span class="btn__text">
                                        <i class="socicon socicon-twitter"></i>
                                        Share on Twitter
                                    </span>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </div>
        </article>
    </section>

    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="comments">
                        <h3>4 Comments</h3>
                        <ul class="comments__list">
                            <li>
                                <div class="comment">
                                    <div class="comment__avatar">
                                        <img alt="Image" src="{{ asset('frontend/img/avatar-round-1.png') }}" />
                                    </div>
                                    <div class="comment__body">
                                        <h5 class="type--fine-print">Anne Brady</h5>
                                        <div class="comment__meta">
                                            <span>10th May 2016</span>
                                            <a href="#">Reply</a>
                                        </div>
                                        <p>
                                            Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                        </p>
                                    </div>
                                </div>
                                <!--end comment-->
                                <div class="comment">
                                    <div class="comment__avatar">
                                        <img alt="Image" src="{{ asset('frontend/img/avatar-round-3.png') }}" />
                                    </div>
                                    <div class="comment__body">
                                        <h5 class="type--fine-print">Jacob Sims</h5>
                                        <div class="comment__meta">
                                            <span>10th May 2016</span>
                                            <a href="#">Reply</a>
                                        </div>
                                        <p>
                                            Prototype intuitive intuitive thought leader personas parallax paradigm long shadow engaging unicorn SpaceTeam fund ideate paradigm.
                                        </p>
                                    </div>
                                </div>
                                <!--end comment-->
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment__avatar">
                                        <img alt="Image" src="{{ asset('frontend/img/avatar-round-2.png') }}" />
                                    </div>
                                    <div class="comment__body">
                                        <h5 class="type--fine-print">Kelly Dewitt</h5>
                                        <div class="comment__meta">
                                            <span>11th May 2016</span>
                                            <a href="#">Reply</a>
                                        </div>
                                        <p>
                                            Responsive hacker intuitive driven waterfall is so 2000 and late intuitive cortado bootstrapping venture capital. Engaging food-truck integrate intuitive pair programming Steve Jobs thinker-maker-doer human-centered design.
                                        </p>
                                        <p>
                                            Affordances food-truck SpaceTeam unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                        </p>
                                    </div>
                                </div>
                                <!--end comment-->
                            </li>
                            <li>
                                <div class="comment">
                                    <div class="comment__avatar">
                                        <img alt="Image" src="{{ asset('frontend/img/avatar-round-4.png') }}" />
                                    </div>
                                    <div class="comment__body">
                                        <h5 class="type--fine-print">Luke Smith</h5>
                                        <div class="comment__meta">
                                            <span>11th May 2016</span>
                                            <a href="#">Reply</a>
                                        </div>
                                        <p>
                                            Unicorn disrupt integrate viral pair programming big data pitch deck intuitive intuitive prototype long shadow. Responsive hacker intuitive driven
                                        </p>
                                    </div>
                                </div>
                                <!--end comment-->
                            </li>
                        </ul>
                    </div>
                    <!--end comments-->
                    <div class="comments-form">
                        <h4>Leave a comment</h4>
                        <form class="row">
                            <div class="col-md-6">
                                <label>Your Name:</label>
                                <input type="text" name="Name" placeholder="Type name here" />
                            </div>
                            <div class="col-md-6">
                                <label>Email Address:</label>
                                <input type="email" name="email" placeholder="you@mailprovider.com" />
                            </div>
                            <div class="col-md-12">
                                <label>Comment:</label>
                                <textarea rows="4" name="Message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn--primary" type="submit">Submit Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>

    <section class="bg--secondary">
        <div class="container">
            <div class="row text-block">
                <div class="col-md-12">
                    <h3>More recent stories</h3>
                </div>
            </div>
            <!--end of row-->
            <div class="row">
                @foreach ($postsHasSameTags as $post)
                    <div class="col-md-4">
                        <article class="feature feature-1">
                            <a href="#" class="block">
                                <img style="height: 238px;" alt="Image" src="{{ asset('uploads/'.$post->image) }}" />
                            </a>
                            <div class="feature__body boxed boxed--border">
                                <span>{{ $post->created_at->format('d M Y, h:i') }}</span>
                                <h5>{{ str_limit($post->description, 40) }}</h5>
                                <a href="{{ url("/post/{$post->id}/".str_slug($post->title)) }}">
                                    Read More
                                </a>
                            </div>
                        </article>
                    </div>
                    <!--end item-->
                @endforeach
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection
