<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="client/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        header {
            height: 110px;
            background-color: #3975EA;
        }

        body {
            background-color: #F5F5F5;
            padding: 0;
            margin: 0;
        }

        .img-thumbnail {
            transition: 0.2s;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
        }

        .marquee {
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            width: 500px;
            margin-left: 50px;
        }

        .marquee p {
            display: inline-block;
            padding-left: 100%;
            /* Tạo khoảng cách bên trái */
            animation: marquee 15s linear infinite;
            color: white;
        }

        @keyframes marquee {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100%, 0);
            }
        }
.custom-hover {
    color: black;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.custom-hover:hover {
    color: rgb(19, 150, 220);
}
    </style>
</head>

<body ng-app="myApp">
    <div class="container-fluid">
        <header>
            <div class="container navbar justify-content-start">
                <a href="/"> <img style="width: 200px; height: 100px;margin-right: 150px;"
                        src="client/image/logoHeader-removebg-preview(1).png" alt=""></a>
                <form class="d-flex position-relative" role="search">
                    <input class="form-control ms-2 w-300" type="search" placeholder="Bạn cần tìm gì?"
                        aria-label="Search">
                    <button class="btn btn-primary position-absolute start-80 w-25 p-1 top-5" type="submit"><i
                            class="bi bi-search"></i></button>
                </form>
                <div class="navbar-brand ms-5 mt-3">
                    <div class="d-flex">
                        <i class="bi bi-telephone text-white me-2"></i>
                        <a href="" class="text-white fs-6 text-decoration-none">Gọi mua hàng</a>
                    </div>
                    <p class="text-white fs-6 ms-4">0862810416</p>
                </div>
                <div class="navbar-brand ms-2 mt-2">
                    <div class="d-flex">
                        <i class="bi bi-truck text-white me-2"></i>
                        <a href="" class="text-white fs-6 text-decoration-none">Tra cứu
                            <p>đơn hàng</p>
                        </a>
                    </div>
                </div>
                <div class="navbar-brand ms-2 mb-4">
                    <div class="d-flex">
                        <i class="bi bi-cart3 text-white me-2"></i>
                        <a href="Cart.html" class="text-white fs-6 text-decoration-none">
                            Giỏ hàng
                        </a>
                    </div>
                </div>
                <div class="navbar-brand ms-2 mb-4">
                    <div class="d-flex">
                        @if (session()->has('user'))
                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                data-bs-toggle="dropdown">
                                <img src="{{Storage::url(session('user')->image)}}"
                                    class="avatar img-fluid rounded me-1" alt="" width="30px" />
                                <span class="text-white">{{ session('user')->username }}</span>
                            </a>
                            @if (session('user')->type == 'admin' || session('user')->type == 'employee')
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('users.profile') }}"><i
                                            class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <a class="dropdown-item" href="/dashboard"><i class="align-middle me-1"
                                            data-feather="pie-chart"></i>Truy cập trang admin</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                                            data-feather="settings"></i> Đơn Hàng</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                            data-feather="help-circle"></i> Help Center</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item">Log out</button>
                                    </form>

                                </div>
                            @else
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ route('users.profile') }}"><i
                                            class="align-middle me-1" data-feather="user"></i> Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="index.html"><i class="align-middle me-1"
                                            data-feather="settings"></i> Settings & Privacy</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                            data-feather="help-circle"></i> Help Center</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button class="dropdown-item">Log out</button>
                                    </form>

                                </div>
                            @endif
                        @else
                            <i class="bi bi-person-circle text-white me-2"></i>
                            <div role="button" class="text-white fs-6 text-decoration-none" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-primary ms-180 fw-semibold"
                                                    id="exampleModalLabel">L-member</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="client/image/logoHaMa.png" alt=""
                                                    style="width: 100px;">
                                                <p class="text-black m-0">Vui lòng đăng nhập tài khoản L-member để xem
                                                    ưu đãi
                                                <p class="text-black"> và thanh toán dễ dàng hơn</p>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-outline-primary" href="/register">Đăng kí</a>
                                                <a class="btn btn-primary" href="/login">Đăng nhập</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                Tài khoản
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </header>
        <div class="container d-flex gap-3 mt-3">
            <aside class="col-md-2">
                <div class="list-group" ng-controller="myCtrl">
                    <a href="CategoryProduct.html" class="list-group-item list-group-item-action"
                        aria-current="true">
                        Điện thoại
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Apple chính hãng
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Máy tính bảng
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Laptop
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Âm thanh
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Đồng hồ, máy ảnh
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Phụ kiện
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Kho hàng cũ
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Khuyến mãi
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        Tin công nghệ
                    </a>
                </div>
            </aside>
            <article class="col-md-7">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="" aria-label="Slide 1" fdprocessedid="zjwax"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2" fdprocessedid="qmld0s" class=""></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3" fdprocessedid="cvv6zb" class="active" aria-current="true"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="client/image/banner3.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="client/image/banner2.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="client/image/banner4.webp" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="card mt-3" style="width:100%; height: 70px;">
                        <img src="client/image/1200x100-1200x100.png" class="card-img-top h-100" alt="...">
                    </div>
                </div>
            </article>
            <aside class="col-md-3 ms-2">
                <div class="card" style="width: 18rem;">
                    <img src="client/image/banner5.webp" class="card-img-top" alt="...">
                </div>
                <div class="card my-3" style="width: 18rem;">
                    <img src="client/image/banner6.webp" class="card-img-top" alt="...">
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="client/image/banner7.webp" class="card-img-top" alt="...">
                </div>
            </aside>
        </div>
        <div class="container mt-3">
            <div class="card" style="width:100%; height: 200px;">
                <div class="d-flex gap-4 ">
                    <div class="ms-4">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Iphone 14 Series.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Iphone 14 Series</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Sansung S23 Series.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Samsung S23</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Oppo Find N2 Flip.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Oppo Find N2</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Xiaomi Redmi Note 12.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Xiaomi Redmi</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/iPhone Cũ.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">iPhone Cũ</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/iPad Gen 9.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">iPad Gen 9</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/AirPods 2.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">AirPods 2</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Ép kính IP.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Ép kính iPhone</p>
                    </div>
                    <div class="">
                        <div class="card mt-3 overflow-hidden" style="width:120px; height: 120px;">
                            <img src="client/image/Thay pin iPhone.webp" class="img-thumbnail" alt="...">
                        </div>
                        <p class="fs-6 text-center">Thay pin iPhone</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mt-3">
            <div class="card bg-primary">
                <div class="d-flex align-items-center">
                    <h1 class="fs-3 text-white m-3">Sản phẩm khuyến mãi</h1>
                    <div class="marquee">
                        <p class="m-3">Xả kho xiaomi giá cực sốc, 12Pro giảm 800k, K50 Ultra giảm giá 1 triệu</p>
                    </div>
                </div>
                <div class="d-flex gap-1">
                    @foreach ($data as $pro)   
                    <div class="card align-items-center ms-3" style="width:240px;">
                        @php
                            $images = json_decode($pro->variant->product->image, true);  
                            @endphp
                              @if (is_array($images) && !empty($images))
                              <img src="{{Storage::url($images[0])}}" class="w-85 border border-3 border-primary mt-3"
                            alt="...">
                      @endif 
                        
                        <div class="card-body">
                            <a class="custom-hover" href="{{route('detailproduct',$pro->id)}}"><h5 class="card-title">{{$pro->variant->product->name}}</h5></a>  
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">{{ number_format($pro->variant->price, 0, ',', '.') }}đ<br></p>
                                <p class="text-decoration-line-through">16.650.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 11 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 11</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">9.745.000đ</p>
                                <p class="text-decoration-line-through">10.950.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 12 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 12</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">13.750.000đ</p>
                                <p class="text-decoration-line-through">15.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 13 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 13</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">16.420.000đ</p>
                                <p class="text-decoration-line-through">18.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 13 Mini Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 13 Mini</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">16.189.000đ</p>
                                <p class="text-decoration-line-through">18.190.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <button class="btn btn-light w-20 my-3 m-auto">Xem tất cả</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fs-3 text-black m-3 border-start border-3 border-black ps-3">Sản phẩm mới</h1>
                    <a class="text-decoration-none text-dark me-4" href="">Xem tất cả</a>
                </div>
                <div class="d-flex gap-3">
                    <div class="card align-items-center ms-4" style="width:240px;">
                        <img src="client/image/IPhone 13 Pro Max Chính Hãng.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <a class="text-decoration-none" href="DetailProduct.html">
                                <h5 class="card-title text-black">IPhone 13 Pro Max Chính Hãng VN/A</h5>
                            </a>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">25.875.000đ</p>
                                <p class="text-decoration-line-through">26.650.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 11 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 11 Chính Hãng VN/A</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">9.745.000đ</p>
                                <p class="text-decoration-line-through">10.950.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 12 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 12 Chính Hãng VN/A</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">13.750.000đ</p>
                                <p class="text-decoration-line-through">15.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 13 Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 13 Chính Hãng VN/A</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">16.420.000đ</p>
                                <p class="text-decoration-line-through">18.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Iphone 13 Mini Chính hãng VN.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">iPhone 13 Mini Chính Hãng VN/A</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">16.189.000đ</p>
                                <p class="text-decoration-line-through">18.190.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary w-20 my-3 m-auto">Xem tất cả</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fs-3 text-black m-3 border-start border-3 border-black ps-3">Sản phẩm bán chạy</h1>
                    <a class="text-decoration-none text-dark me-4" href="">Xem tất cả</a>
                </div>
                <div class="d-flex justify-content-between gap-3 mt-3">
                    <div class="card align-items-center ms-4" style="width:240px;">
                        <img src="client/image/Xiaomi 12S Ultra - Phân Phối Chính Hãng.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi 12S Ultra - Phân Phối Chính Hãng</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">20.950.000đ</p>
                                <p class="text-decoration-line-through">22.650.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Xiaomi 12 - Phân Phối Chính Hãng.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi 12 - Phân Phối Chính Hãng</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">9.745.000đ</p>
                                <p class="text-decoration-line-through">10.950.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Xiaomi 13 - Phân Phối Chính Hãng.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi 13 - Phân Phối Chính Hãng</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">13.750.000đ</p>
                                <p class="text-decoration-line-through">15.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center" style="width:240px;">
                        <img src="client/image/Xiaomi Black Shark 4S - Phân Phối Chính Hãng.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi Black Shark 4S - Chính Hãng</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">10.420.000đ</p>
                                <p class="text-decoration-line-through">16.450.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card align-items-center me-3" style="width:240px;">
                        <img src="client/image/Xiaomi Redmi Note 12.webp"
                            class="w-85 border border-3 border-primary mt-3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi Redmi Note 12i - Chính Hãng</h5>
                            <div class="d-flex gap-3">
                                <p class="card-text text-danger fw-bold">8.189.000đ</p>
                                <p class="text-decoration-line-through">10.190.000đ</p>
                            </div>
                            <div class="card bg-dark-subtle">
                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6
                                    tháng</p>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="d-flex">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    <p>Yêu thích</p>
                                    <i class="bi bi-heart text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary w-20 my-3 m-auto">Xem tất cả</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="card">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fs-3 text-black m-3 border-start border-3 border-black ps-3">Iphone Chính Hãng</h1>
                    <a class="text-decoration-none text-dark me-4" href="">Xem tất cả</a>
                </div>
                <div class="d-flex justify-content-between gap-3 mt-3">
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>

                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex justify-content-between gap-3 mt-3">
                                    <div class="card align-items-center ms-4" style="width:240px;">
                                        <img src="client/image/Xiaomi 12S Ultra - Phân Phối Chính Hãng.webp"
                                            class="w-85 border border-3 border-primary mt-3" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Xiaomi 12S Ultra - Phân Phối Chính Hãng</h5>
                                            <div class="d-flex gap-3">
                                                <p class="card-text text-danger fw-bold">20.950.000đ</p>
                                                <p class="text-decoration-line-through">22.650.000đ</p>
                                            </div>
                                            <div class="card bg-dark-subtle">
                                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                    dụng kì hạn 3-6 tháng</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <div class="d-flex">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p>Yêu thích</p>
                                                    <i class="bi bi-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card align-items-center" style="width:240px;">
                                        <img src="client/image/Xiaomi 12 - Phân Phối Chính Hãng.webp"
                                            class="w-85 border border-3 border-primary mt-3" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Xiaomi 12 - Phân Phối Chính Hãng</h5>
                                            <div class="d-flex gap-3">
                                                <p class="card-text text-danger fw-bold">9.745.000đ</p>
                                                <p class="text-decoration-line-through">10.950.000đ</p>
                                            </div>
                                            <div class="card bg-dark-subtle">
                                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                    dụng kì hạn 3-6 tháng</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <div class="d-flex">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p>Yêu thích</p>
                                                    <i class="bi bi-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card align-items-center" style="width:240px;">
                                        <img src="client/image/Xiaomi Black Shark 4S - Phân Phối Chính Hãng.webp"
                                            class="w-85 border border-3 border-primary mt-3" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Xiaomi Black Shark 4S - Chính Hãng</h5>
                                            <div class="d-flex gap-3">
                                                <p class="card-text text-danger fw-bold">10.420.000đ</p>
                                                <p class="text-decoration-line-through">16.450.000đ</p>
                                            </div>
                                            <div class="card bg-dark-subtle">
                                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                    dụng kì hạn 3-6 tháng</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <div class="d-flex">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p>Yêu thích</p>
                                                    <i class="bi bi-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card align-items-center" style="width:240px;">
                                        <img src="client/image/Xiaomi 13 - Phân Phối Chính Hãng.webp"
                                            class="w-85 border border-3 border-primary mt-3" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Xiaomi 13 - Phân Phối Chính Hãng</h5>
                                            <div class="d-flex gap-3">
                                                <p class="card-text text-danger fw-bold">13.750.000đ</p>
                                                <p class="text-decoration-line-through">15.450.000đ</p>
                                            </div>
                                            <div class="card bg-dark-subtle">
                                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                    dụng kì hạn 3-6 tháng</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <div class="d-flex">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p>Yêu thích</p>
                                                    <i class="bi bi-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card align-items-center me-3" style="width:240px;">
                                        <img src="client/image/Xiaomi Redmi Note 12.webp"
                                            class="w-85 border border-3 border-primary mt-3" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Xiaomi Redmi Note 12i - Chính Hãng</h5>
                                            <div class="d-flex gap-3">
                                                <p class="card-text text-danger fw-bold">8.189.000đ</p>
                                                <p class="text-decoration-line-through">10.190.000đ</p>
                                            </div>
                                            <div class="card bg-dark-subtle">
                                                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                    dụng kì hạn 3-6 tháng</p>
                                            </div>
                                            <div class="d-flex justify-content-between mt-1">
                                                <div class="d-flex">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p>Yêu thích</p>
                                                    <i class="bi bi-heart text-danger"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="carousel-item">
                              <div class="d-flex justify-content-between gap-3 mt-3">
                                  <div class="card align-items-center ms-4" style="width:240px;">
                                      <img src="client/image/Xiaomi 12S Ultra - Phân Phối Chính Hãng.webp"
                                          class="w-85 border border-3 border-primary mt-3" alt="...">
                                      <div class="card-body">
                                          <h5 class="card-title">Xiaomi 12S Ultra - Phân Phối Chính Hãng</h5>
                                          <div class="d-flex gap-3">
                                              <p class="card-text text-danger fw-bold">20.950.000đ</p>
                                              <p class="text-decoration-line-through">22.650.000đ</p>
                                          </div>
                                          <div class="card bg-dark-subtle">
                                              <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                  dụng kì hạn 3-6 tháng</p>
                                          </div>
                                          <div class="d-flex justify-content-between mt-1">
                                              <div class="d-flex">
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                              </div>
                                              <div class="d-flex gap-1">
                                                  <p>Yêu thích</p>
                                                  <i class="bi bi-heart text-danger"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card align-items-center" style="width:240px;">
                                      <img src="client/image/Xiaomi 12 - Phân Phối Chính Hãng.webp"
                                          class="w-85 border border-3 border-primary mt-3" alt="...">
                                      <div class="card-body">
                                          <h5 class="card-title">Xiaomi 12 - Phân Phối Chính Hãng</h5>
                                          <div class="d-flex gap-3">
                                              <p class="card-text text-danger fw-bold">9.745.000đ</p>
                                              <p class="text-decoration-line-through">10.950.000đ</p>
                                          </div>
                                          <div class="card bg-dark-subtle">
                                              <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                  dụng kì hạn 3-6 tháng</p>
                                          </div>
                                          <div class="d-flex justify-content-between mt-1">
                                              <div class="d-flex">
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                              </div>
                                              <div class="d-flex gap-1">
                                                  <p>Yêu thích</p>
                                                  <i class="bi bi-heart text-danger"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card align-items-center" style="width:240px;">
                                      <img src="client/image/Xiaomi 13 - Phân Phối Chính Hãng.webp"
                                          class="w-85 border border-3 border-primary mt-3" alt="...">
                                      <div class="card-body">
                                          <h5 class="card-title">Xiaomi 13 - Phân Phối Chính Hãng</h5>
                                          <div class="d-flex gap-3">
                                              <p class="card-text text-danger fw-bold">13.750.000đ</p>
                                              <p class="text-decoration-line-through">15.450.000đ</p>
                                          </div>
                                          <div class="card bg-dark-subtle">
                                              <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                  dụng kì hạn 3-6 tháng</p>
                                          </div>
                                          <div class="d-flex justify-content-between mt-1">
                                              <div class="d-flex">
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                              </div>
                                              <div class="d-flex gap-1">
                                                  <p>Yêu thích</p>
                                                  <i class="bi bi-heart text-danger"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card align-items-center" style="width:240px;">
                                      <img src="client/image/Xiaomi Black Shark 4S - Phân Phối Chính Hãng.webp"
                                          class="w-85 border border-3 border-primary mt-3" alt="...">
                                      <div class="card-body">
                                          <h5 class="card-title">Xiaomi Black Shark 4S - Chính Hãng</h5>
                                          <div class="d-flex gap-3">
                                              <p class="card-text text-danger fw-bold">10.420.000đ</p>
                                              <p class="text-decoration-line-through">16.450.000đ</p>
                                          </div>
                                          <div class="card bg-dark-subtle">
                                              <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                  dụng kì hạn 3-6 tháng</p>
                                          </div>
                                          <div class="d-flex justify-content-between mt-1">
                                              <div class="d-flex">
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                              </div>
                                              <div class="d-flex gap-1">
                                                  <p>Yêu thích</p>
                                                  <i class="bi bi-heart text-danger"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card align-items-center me-3" style="width:240px;">
                                      <img src="client/image/Xiaomi Redmi Note 12.webp"
                                          class="w-85 border border-3 border-primary mt-3" alt="...">
                                      <div class="card-body">
                                          <h5 class="card-title">Xiaomi Redmi Note 12i - Chính Hãng</h5>
                                          <div class="d-flex gap-3">
                                              <p class="card-text text-danger fw-bold">8.189.000đ</p>
                                              <p class="text-decoration-line-through">10.190.000đ</p>
                                          </div>
                                          <div class="card bg-dark-subtle">
                                              <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín
                                                  dụng kì hạn 3-6 tháng</p>
                                          </div>
                                          <div class="d-flex justify-content-between mt-1">
                                              <div class="d-flex">
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                                  <i class="bi bi-star-fill text-warning"></i>
                                              </div>
                                              <div class="d-flex gap-1">
                                                  <p>Yêu thích</p>
                                                  <i class="bi bi-heart text-danger"></i>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <button class="btn btn-primary w-20 my-3 m-auto">Xem tất cả</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="card" style="width:100%;">
                <div class="d-flex gap-4 m-auto my-3">
                    <div class="card overflow-hidden" style="width: 19rem;">
                        <img src="client/image/banner9.webp" alt="" class="img-thumbnail w-100 rounded p-0">
                    </div>
                    <div class="card overflow-hidden" style="width: 19rem;">
                        <img src="client/image/banner10.webp" alt="" class="img-thumbnail w-100 rounded p-0">
                    </div>
                    <div class="card overflow-hidden" style="width: 19rem;">
                        <img src="client/image/banner11.webp" alt="" class="img-thumbnail w-100 rounded p-0">
                    </div>
                    <div class="card overflow-hidden" style="width: 19rem;">
                        <img src="client/image/banner12.webp" alt="" class="img-thumbnail w-100 rounded p-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-flex gap-3 mt-3">
            <div class="col-8">
                <div class="card">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="fs-3 text-black m-3 border-start border-3 border-black ps-3">Tin tức mới</h1>
                        <a class="text-decoration-none text-dark me-4" href="">Xem tất cả</a>
                    </div>
                    <div class="d-flex">
                        <div class="col-6 ms-3">
                            <img class=""
                                src="client/image/so-sanh-thiet-ke-apple-watch-8-v_382ad5795e0041aaabccfdb1ac761ff7_large.webp"
                                alt="" style="width: 420px;"><br>
                            <a class="text-decoration-none text-dark fs-5 fw-semibold" href="">So sánh Apple
                                Watch Ultra vs Watch
                                Series 8:Đâu là lựa chọn tốt nhất</a>
                            <p class="fs-6">Apple Watch Ultra vs Watch Series 8 có gì khác biệt? Apple Watch Ultra vs
                                Watch Series 8
                                là 2 mẫu đồng hồ... </p>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <img src="client/image/12.webp" alt="" style="width: 140px;height:80px">
                                <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                    Tin tức: Realme GT Neo 5 ra mắt với chip Snapdragon đầu 8, sạc nhanh..
                                    <div class="d-flex h-25">
                                        <i class="bi bi-calendar2-week me-1"></i>
                                        <p class="fw-light">06/07/2004</p>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex my-1">
                                <img src="client/image/new2.jpg" alt="" style="width: 140px;height:80px">
                                <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                    Rò rỉ ảnh chụp thực tế của camera Samsung Galaxy S23 Ultra
                                    <div class="d-flex h-25">
                                        <i class="bi bi-calendar2-week me-1"></i>
                                        <p class="fw-light">06/07/2004</p>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex">
                                <img src="client/image/new3.jpg" alt="" style="width: 140px;height:80px">
                                <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                    MacBook Air 2023 sẽ mang đến những tính năng mới nào khi...
                                    <div class="d-flex h-25">
                                        <i class="bi bi-calendar2-week me-1"></i>
                                        <p class="fw-light">06/07/2004</p>
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex mt-1">
                                <img src="client/image/new4.jpg" alt="" style="width: 140px;height:80px">
                                <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                    Redmi Note 12 Turbo thiết bị bán chạy nhất trong tháng đầu tiên...
                                    <div class="d-flex h-25">
                                        <i class="bi bi-calendar2-week me-1"></i>
                                        <p class="fw-light">06/07/2004</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-4pl">
                <div class="card">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="fs-3 text-black m-3 border-start border-3 border-black ps-3">Tin tức công nghệ</h1>
                        <a class="text-decoration-none text-dark me-4" href="">Xem tất cả</a>
                    </div>
                    <div class="ps-3">
                        <div class="d-flex">
                            <img src="client/image/12.webp" alt="" style="width: 140px;height:80px">
                            <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                Tin tức: Realme GT Neo 5 ra mắt với chip Snapdragon đầu 8...
                                <div class="d-flex h-25">
                                    <i class="bi bi-calendar2-week me-1"></i>
                                    <p class="fw-light">06/07/2004</p>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex my-1">
                            <img src="client/image/new2.jpg" alt="" style="width: 140px;height:80px">
                            <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                Rò rỉ ảnh chụp thực tế của camera Samsung Galaxy S23...
                                <div class="d-flex h-25">
                                    <i class="bi bi-calendar2-week me-1"></i>
                                    <p class="fw-light">06/07/2004</p>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex">
                            <img src="client/image/new3.jpg" alt="" style="width: 140px;height:80px">
                            <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                MacBook Air 2023 sẽ mang đến những tính năng mới nào khi...
                                <div class="d-flex h-25">
                                    <i class="bi bi-calendar2-week me-1"></i>
                                    <p class="fw-light">06/07/2004</p>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex mt-1">
                            <img src="client/image/new4.jpg" alt="" style="width: 140px;height:80px">
                            <a class="text-decoration-none ms-1 text-dark fw-semibold w-60" href="">
                                Redmi Note 12 Turbo thiết bị bán chạy nhất trong tháng đầu tiên...
                                <div class="d-flex h-25">
                                    <i class="bi bi-calendar2-week me-1"></i>
                                    <p class="fw-light">06/07/2004</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid mt-3 bg-dark">
            <div class="container">
                <div class="d-flex align-items-center">
                    <p class="text-white fs-4 me-5 mt-2">Đăng kí nhận tin</p>
                    <form class="d-flex" role="search">
                        <input class="form-control ms-5 w-300 rounded-0" type="search" placeholder="Search"
                            aria-label="Search">
                        <input class="btn btn-primary w-25 rounded-0" type="submit" value="Gửi">
                    </form>
                    <div style="margin-left: 480px;">
                        <img src="client/image/facebook.png" alt="" style="width: 30px;">
                        <img src="client/image/mess.png" alt="" style="width: 30px;">
                        <img src="client/image/tiktok.png" alt="" style="width: 30px;">
                        <img src="client/image/youtube.png" alt="" style="width: 30px;">
                        <img src="client/image/instagram.png" alt="" style="width: 30px;">
                    </div>
                </div>
                <hr class="text-white m-0">
                <div class="d-flex gap-5 justify-content-between">
                    <div class="text-white w-25">
                        <img src="client/image/logoHeader-removebg-preview(1).png" alt=""
                            style="width: 200px;">
                        <p>Phone Store - Điện thoại siêu rẻ, trao trọn yên tâm</p>
                        <div class="d-flex">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <p>80 Xuân Phương, Phường Phương Canh, Quận Nam Từ Niêm, Hà Nội</p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-telephone-fill me-2"></i>
                            <p>0862810416</p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-envelope-fill me-2"></i>
                            <p>longnt2k4@gmail.com</p>
                        </div>
                    </div>
                    <div class="text-white">
                        <p class="fs-5 mt-3">Thông tin và Chính sách</p>
                        <li>Chính sách bảo hành</li>
                        <li>Chính sách giao hàng</li>
                        <li>Tra cứu bảo hành</li>
                        <li>Trả góp online</li>
                        <li>Tra cứu thông tin bảo hành</li>
                        <li>Tra cứu hóa đơn điện tử</li>
                    </div>
                    <div class="text-white">
                        <p class="fs-5 mt-3">Dịch vụ và thông tin khác</p>
                        <li>Khách hàng doanh nghiệp</li>
                        <li>Ưu đãi thanh toán</li>
                        <li>Quy chế hoạt động</li>
                        <li>Chính sách bảo mật thông tin cá nhân</li>
                        <li><a class="text-decoration-none text-white" href="About.html">Giới thiệu</a></li>
                        <li><a class="text-decoration-none text-white" href="Contact.html">Liên hệ</a></li>
                    </div>
                    <div class="text-white">
                        <p class="fs-5 mt-3">Tổng đài hỗ trợ miễn phí</p>
                        <li>Gọi mua hàng: 0862810416</li>
                        <li>Gọi khiếu nại: 0862810416</li>
                        <li>Gọi bảo hành: 0862810416</li>
                        <p class="fs-5 mt-3">Phương thức thanh toán</p>
                        <div class="">
                            <img src="client/image/vnpay-logo.png" alt="">
                            <img src="client/image/momo_1.webp" alt="">
                            <img src="client/image/onepay-logo.webp" alt="">
                            <img src="client/image/zalopay-logo.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="container-fluid bg-black">
            <p class="text-white p-3 text-center m-0">@Copyright by Nguyễn Thành Long - PH45182</p>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

</html>
