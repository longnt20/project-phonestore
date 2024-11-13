@extends('admin.layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Profile</h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more page examples
            </a>
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Profile Details</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="img/avatars/avatar-4.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2"
                            width="128" height="128" />
                        <h5 class="card-title mb-0">Christina Mason</h5>
                        <div class="text-muted mb-2">Lead Developer</div>

                        <div>
                            <a class="btn btn-primary btn-sm" href="#">Follow</a>
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span>
                                Message</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Skills</h5>
                        <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                        <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                        <a href="#" class="badge bg-primary me-1 my-1">React</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UX</a>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a
                                    href="#">San Francisco, SA</a></li>

                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a
                                    href="#">GitHub</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a
                                    href="#">Boston</a></li>
                        </ul>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Elsewhere</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="#">staciehall.co</a></li>
                            <li class="mb-1"><a href="#">Twitter</a></li>
                            <li class="mb-1"><a href="#">Facebook</a></li>
                            <li class="mb-1"><a href="#">Instagram</a></li>
                            <li class="mb-1"><a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Personal Information</h5>
                    </div>
                    <div class="card-body h-100">
                        <form enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="first_name" class="col-4 col-form-label">Name</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="first_name" id="first_name" disabled
                                        value="{{ $user_s->name }}" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input type="email" class="form-control" name="email" id="email" disabled
                                        value="{{ $user_s->email }}" />
                                </div>
                            </div>
                            {{-- <div class="mb-3 row">
                                <label for="text" class="col-4 col-form-label">Sò đang có</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" name="text" id="text" disabled
                                        value="{{$user_s->deposit_id}}" />
                                </div>
                            </div> --}}
                            <div class="mb-3 row">
                                <label for="phone" class="col-4 col-form-label">Type</label>
                                <div class="col-8">
                                    @if ($user_s->type == 'admin')
                                    <button class="btn btn-danger">
                                        <span class="badge bg-danger">Admin</span>
                                    </button>
                                @endif
                                @if ($user_s->type == 'employee')
                                    <button class="btn btn-warning">
                                        <span class="badge bg-warning">Employee</span>
                                    </button>
                                @endif
                                @if ($user_s->type == 'client')
                                <button class="btn btn-primary">
                                    <span class="badge bg-primary">Client</span>
                                </button>
                            @endif

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
                <img src="img/avatars/avatar-4.jpg" width="36" height="36" class="rounded-circle me-2"
                    alt="Christina Mason">
                <div class="flex-grow-1">
                    <small class="float-end text-navy">1d ago</small>
                    <strong>Christina Mason</strong> posted a new blog<br />
                    <small class="text-muted">Yesterday 2:43 pm</small>
                </div>
            </div>

            <hr />
            <div class="d-flex align-items-start">
                <img src="img/avatars/avatar.jpg" width="36" height="36" class="rounded-circle me-2"
                    alt="Charles Hall">
                <div class="flex-grow-1">
                    <small class="float-end text-navy">1d ago</small>
                    <strong>Charles Hall</strong> started following <strong>Christina Mason</strong><br />
                    <small class="text-muted">Yesterdag 1:51 pm</small>
                </div>
            </div>

            <hr />
            <div class="d-grid">
                <a href="#" class="btn btn-primary">Load more</a>
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
@endsection
