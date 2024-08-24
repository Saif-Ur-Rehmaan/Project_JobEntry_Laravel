@extends('layout.Layout')
@section('content')
    <div class="container-xxl bg-white p-0">



        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobEntry</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Jobs</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="job-list.html" class="dropdown-item">Job List</a>
                            <a href="job-detail.html" class="dropdown-item active">Job Detail</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="category.html" class="dropdown-item">Job Category</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="{{ $Job->JobCompanyImage }}"
                                alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{ $Job->JobName }}</h3>
                                <span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $Job->JobLocation }}</span>
                                <span class="text-truncate me-3"><i
                                        class="far fa-clock text-primary me-2"></i>{{ $Job->JobNature }}</span>
                                <span class="text-truncate me-0"><i
                                        class="far fa-money-bill-alt text-primary me-2"></i>${{ $Job->JobMinPrice }}
                                    - ${{ $Job->JobMaxPrice }}</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>
                                {{ $Job->JobDescription }}
                            </p>
                            <h4 class="mb-3">Qualifications</h4>
                            <p>{{ $Job->JobQualification }}</p>
                        </div>

                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form action="/UserApplyForJob" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="JobId" value="{{$Job->id}}">
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" value="{{ old('UserName') }}" name="UserName"
                                            class="form-control" placeholder="Your Name">
                                        @error('UserName')
                                            <p class="text-danger fw-bolder">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" value="{{ old('UserEmail') }}" name="UserEmail" class="form-control"
                                            placeholder="Your Email">
                                        @error('UserEmail')
                                            <p class="text-danger fw-bolder">{{ $message }}</p>
                                        @enderror
                                        
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" value="{{old('UserPortfolio')}}"  name="UserPortfolio"  class="form-control" placeholder="Portfolio Website">
                                        @error('UserPortfolio')
                                            <p class="text-danger fw-bolder">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" accept=".pdf" value="{{old('UserCV')}}" name="UserCV" class="form-control bg-white">
                                        @error('UserCV')
                                            <p class="text-danger fw-bolder">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <textarea name="UserCoverLetter"   class="form-control" rows="5" placeholder="Coverletter">{{old("UserCoverLetter")}}</textarea>
                                        @error('UserCoverLetter')
                                            <p class="text-danger fw-bolder">{{ $message }}</p>
                                        @enderror
                                    
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:{{ $Job->JobPublishedOn }}
                            </p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $Job->JobVaccencies }}
                                Position</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $Job->JobNature }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: ${{ $Job->JobMinPrice }} -
                                ${{ $Job->JobMaxPrice }}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location:{{ $Job->JobLocation }}</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date
                                Line:{{ $Job->JobDateLine }}
                            </p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p>{{ $Job->JobCompanyDetail }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->
        @if (session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Your email">
                            <button type="button"
                                class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
@endsection
