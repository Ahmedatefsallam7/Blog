@extends('website.layout.layout')

@section('body')
    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                <div class="d-flex">
                    <img src="img/news-100x100-1.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec
                            adipis elit</a>
                    </div>
                </div>
                <div class="d-flex">
                    <img src="img/news-100x100-2.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet
                            consec adipis elit</a>
                    </div>
                </div>
                <div class="d-flex">
                    <img src="img/news-100x100-3.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet
                            consec adipis elit</a>
                    </div>
                </div>
                <div class="d-flex">
                    <img src="img/news-100x100-4.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                        <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet
                            consec adipis elit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach ($lastFivePosts as $posts)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="">{{ $posts->category->title }}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{ $posts->created_at->format('Y-m-d') }}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold" href="">{{ $posts->title }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="img/cat-500x80-1.jpg" style="object-fit: cover;">
                        <a href=""
                            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Business
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="img/cat-500x80-2.jpg" style="object-fit: cover;">
                        <a href=""
                            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Technology
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="img/cat-500x80-3.jpg" style="object-fit: cover;">
                        <a href=""
                            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Entertainment
                        </a>
                    </div>
                    <div class="position-relative overflow-hidden" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="img/cat-500x80-4.jpg" style="object-fit: cover;">
                        <a href=""
                            class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            Sports
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-1.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-2.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-3.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-4.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid w-100 h-100" src="img/news-300x300-5.jpg" style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-1" style="font-size: 13px;">
                            <a class="text-white" href="">Technology</a>
                            <span class="px-1 text-white">/</span>
                            <a class="text-white" href="">January 01, 2045</a>
                        </div>
                        <a class="h4 m-0 text-white" href="">Sanctus amet sed ipsum lorem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Business</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Technology</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-4.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-5.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-6.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Entertainment</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-6.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-5.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-4.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Sports</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-3.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-2.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 13px;">
                                    <a href="">Technology</a>
                                    <span class="px-1">/</span>
                                    <span>January 01, 2045</span>
                                </div>
                                <a class="h4 m-0" href="">Sanctus amet sed ipsum lorem</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->
@endsection
