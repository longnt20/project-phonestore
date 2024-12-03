<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../client/css/bootstrap.min.css">
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

    .bg-green {
      background-color: #63BC63;
    }

    .color-option {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      cursor: pointer;
    }
    .bg-gray{
      background-color: #F2F2F2;
    }
    .color-option input[type="radio"] {
      display: none;
      /* Ẩn nút radio gốc */
    }

    .color-option .color-swatch {
      border: 2px solid black;
      transition: border-color 0.3s ease, transform 0.3s ease;
    }

    .color-option input[type="radio"]:checked+label .color-swatch {
      border-color: red;
      box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
      transform: scale(1.1);
    }
    .storage-option {
            margin-bottom: 10px;
        }

        .storage-option input[type="radio"] {
            display: none; /* Ẩn nút radio gốc */
        }

        .storage-option label {
            display: inline-block;
            padding: 7px 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .storage-option input[type="radio"]:checked + label {
            border-color: red;
        }

        .storage-option label:hover {
            background-color: #f0f0f0;
        }

        .storage-option input[type="radio"]:focus + label {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5);
        }
        .quantity-input {
            display: flex;
            align-items: center;
            border: 1px solid #ced4da;
            border-radius: 5px;
            overflow: hidden;
            width: 140px;
        }
        .quantity-input input {
            border: none;
            text-align: center;
            width: 60px;
            font-size: 1.2rem;
            padding: 5px;
            outline: none;
        }
        .quantity-input button {
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .quantity-input button:focus {
            outline: none;
        }
        .quantity-input button:hover {
            background-color: #0056b3;
        }
        .quantity-input button:disabled {
            background-color: #b0bec5;
            cursor: not-allowed;
        }
  </style>
</head>

<body>
  <div class="container-fluid">
    <header>
      <div class="container navbar justify-content-start">
        <a href="/"><img style="width: 200px; height: 100px;margin-right: 150px;"
            src="../client/image/logoHeader-removebg-preview(1).png" alt=""></a>
        <form class="d-flex position-relative" role="search">
          <input class="form-control ms-5 w-300" type="search" placeholder="Bạn cần tìm gì?" aria-label="Search">
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
        <div class="navbar-brand ms-3 mt-2">
          <div class="d-flex">
            <i class="bi bi-truck text-white me-2"></i>
            <a href="" class="text-white fs-6 text-decoration-none">Tra cứu
              <p>đơn hàng</p>
            </a>
          </div>
        </div>
        <div class="navbar-brand ms-3 mb-4">
          <div class="d-flex">
            <i class="bi bi-cart3 text-white me-2"></i>
            <a href="" class="text-white fs-6 text-decoration-none">
              Giỏ hàng
            </a>
          </div>
        </div>
        <div class="navbar-brand ms-3 mb-4">
          <div class="d-flex">
            <i class="bi bi-person-circle text-white me-2"></i>
            <div role="button" class="text-white fs-6 text-decoration-none" data-bs-toggle="modal"
              data-bs-target="#exampleModal">
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-primary ms-180 fw-semibold" id="exampleModalLabel">L-member</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                      <img src="../client/image/logoHaMa.png" alt="" style="width: 100px;">
                      <p class="text-black m-0">Vui lòng đăng nhập tài khoản L-member để xem ưu đãi
                      <p class="text-black"> và thanh toán dễ dàng hơn</p>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <a class="btn btn-outline-primary" href="login.html">Đăng kí</a>
                      <a class="btn btn-primary" href="login.html">Đăng nhập</a>
                    </div>
                  </div>
                </div>
              </div>
              Tài khoản
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="d-flex gap-3 mt-3">
        <div class="col-9">
          <div class="card">
            <div class="row">
              <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide">
                  <!-- <div class="carousel-indicators bg-black">
                              <div role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                <img src="../client/image/13-trắng.webp" alt="">
                              </div>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div> -->
                  <div class="carousel-inner">
                    @php
                    $images = json_decode($product->variant->product->image, true);  
                    @endphp
                    <div class="carousel-item active">
                        @if (is_array($images) && !empty($images))
                        <img src="{{Storage::url($images[0])}}" class="d-block w-100" alt="...">  
                    </div>
                    <div class="carousel-item">
                      <img src="{{Storage::url($images[1])}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{Storage::url($images[2])}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{Storage::url($images[3])}}" class="d-block w-100" alt="...">
                    </div>
                    
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
                <div class="d-flex gap-2 justify-content-center carousel-indicators-custom">
                  <div role="button" class="card" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active" aria-current="true" aria-label="Slide 1">
                    <img class="rounded-2" src="{{Storage::url($images[0])}}" alt="" style="width: 60px;">
                  </div>
                  <div role="button" class="card" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2">
                    <img class="rounded-2" src="{{Storage::url($images[1])}}" alt="" style="width: 60px;">
                  </div>
                  <div role="button" class="card" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3">
                    <img class="rounded-2" src="{{Storage::url($images[2])}}" alt="" style="width: 60px;">
                  </div>
                  <div role="button" class="card" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                    aria-label="Slide 4">
                    <img class="rounded-2" src="{{Storage::url($images[3])}}" alt="" style="width: 60px;">
                  </div>
                </div>
                @endif 
              </div>
              <div class="col-6">
                <p class="fs-3 mt-3">{{$product->variant->product->name}}</p>
                <div class="d-flex gap-2">
                  <p>Loại:
                  <p class="text-primary">{{$product->variant->product->category->name}}</p>
                  </p>
                </div>
                <div class="d-flex gap-3">
                    <p class="card-text text-danger fw-bold">{{ number_format($product->variant->price, 0, ',', '.') }}đ<br></p>
                    <p class="text-decoration-line-through">16.650.000đ</p>
                </div>
                <p class="m-1">Màu sắc:</p>
                <div class="d-flex gap-2">
                  {{-- @php
                  dd($product->attribute_value);    
                  @endphp --}}
                  @foreach ($product->attribute_value as $att)
                      <div class="color-option">
                          <input class="form-check-input" type="radio" name="color" id="color_{{ $att->id }}" value="{{ $att->value }}">
                          <label for="color_{{ $att->id }}">
                              <div class="card color-swatch" style="width:90px">
                                  <div class="d-flex">
                                      <img src="{{ $att->image_url ?? '../client/image/default.jpg' }}" style="width: 40px;">
                                      <p>{{ $att->value }}</p>
                                  </div>
                              </div>
                          </label>
                      </div>
                      @endforeach
                  
                  
                  {{-- <div class="color-option">
                    <input class="form-check-input" type="radio" name="color" id="colorGreen" value="green">
                    <label for="colorGreen">
                      <div class="card color-swatch" style="width:90px">
                        <div class="d-flex">
                          <img role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                          aria-label="Slide 4" class="rounded-2" src="../client/image/13-đen.webp" alt="" style="width: 40px;">
                          <p>Đen</p>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="color-option">
                    <input class="form-check-input" type="radio" name="color" id="colorBlue" value="blue">
                    <label for="colorBlue">
                      <div class="card color-swatch" style="width:90px">
                        <div class="d-flex">
                          <img role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                           aria-label="Slide 3" class="rounded-2" src="../client/image/13-trắng.webp" alt="" style="width: 40px;">
                          <p class="">Trắng</p>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="color-option">
                    <input class="form-check-input" type="radio" name="color" id="colorYellow" value="yellow">
                    <label for="colorYellow">
                      <div class="card color-swatch" style="width:90px">
                        <div class="d-flex">
                          <img role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                           aria-label="Slide 2" class="rounded-2" src="../client/image/13-vàng.webp" alt="" style="width: 40px;">
                          <p class="">Vàng</p>
                        </div>
                      </div>
                    </label>
                  </div> --}}

                </div>
                <hr class="m-0 me-3 text-dark">
                <p class="m-1">Dung lượng:</p>
                <div class="d-flex gap-2">
                    <div class="storage-option">
                        <input class="form-check-input" type="radio" name="storage" id="storage64GB" value="64GB">
                        <label for="storage64GB">64 GB</label>
                    </div>
                    <div class="storage-option">
                        <input class="form-check-input" type="radio" name="storage" id="storage128GB" value="128GB">
                        <label for="storage128GB">128 GB</label>
                    </div>
                    <div class="storage-option">
                        <input class="form-check-input" type="radio" name="storage" id="storage256GB" value="256GB">
                        <label for="storage256GB">256 GB</label>
                    </div>
                </div>
                <hr class="m-0 me-3">
                <div class="quantity-input mt-2">
                  <button id="decrease" aria-label="Giảm số lượng">-</button>
                  <input type="text" id="quantity" value="1" readonly>
                  <button id="increase" aria-label="Tăng số lượng">+</button>
              </div>
              <a href="#!cart" class="btn btn-danger mt-2" style="width: 470px;height: 70px;"><p class="fs-5 mb-0">Thêm vào giỏ</p> <p>Giao tận nơi hoặc nhận tại cửa hàng</p></a>
              <div class="accordion mt-2" id="accordionFlushExample" style="width: 470px;">
                <div class="accordion-item">
                  <h2 class="accordion-header text-white">
                    <button class="accordion-button bg-primary text-white rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                      <i class="bi bi-shop me-2"></i>  Có 1 cửa hàng còn sản phẩm
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <i class="bi bi-geo-alt-fill"></i>Hà Nội <br>
                      80/50/3 Xuân Phương, Phương Canh, Nam Từ Liêm, Hà Nội <br>
                      Mở cửa 9-22h (các ngày trong tuần)
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            <div class="m-3">
                {!!$product->variant->product->description!!}
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card">
            <div class="list-group m-3">
              <a class="list-group-item bg-green fs-5 text-white" aria-current="true">
                Cam kết bán hàng
              </a>
              <a class="list-group-item list-group-item-action d-flex gap-2 align-items-center">
                <img src="../client/image/camket1.webp" alt="" style="width: 30px;height: 30px;">
                Hàng chính hãng, nguồn gốc rõ ràng
              </a>
              <a class="list-group-item list-group-item-action d-flex gap-2 align-items-center">
                <img src="../client/image/camket2.webp" alt="" style="width: 30px;height: 30px;">
                Tặng máy nếu phát hiện máy sửa chữa
              </a>
              <a class="list-group-item list-group-item-action d-flex gap-2 align-items-center">
                <img src="../client/image/camket3.webp" alt="" style="width: 30px;height: 30px;">
                Giao hàng ngay(Nội thành TP Hà Nội)
              </a>
              <a class="list-group-item list-group-item-action d-flex gap-2 align-items-center">
                <img src="../client/image/camket4.webp" alt="" style="width: 30px;height: 30px;">
                Dùng thử 7 ngày miễn phí
              </a>
            </div>
            <div class="list-group m-3">
              <a href="#" class="list-group-item bg-green fs-5 text-white" aria-current="true">
                Ưu đãi
              </a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>Giảm thêm tới 1% cho thành viên L-member (áp
                dụng tùy sản phẩm)</a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>Bảo vệ sản phẩm toàn diện với dịch vụ bảo hành
                mở rộng</a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                <img src="../client/image/vpBank.webp" alt="">Ưu đãi đến 800k khi mở thẻ VP Bank</a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                <img src="../client/image/kredivo.png" alt="" style="width: 50px;">Giảm thêm 5% tối đa 500.000đ khi thanh toán qua
                Kredivo</a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>
                <img src="../client/image/logo_vib.webp" alt="" style="width: 50px;">Mở thẻ tín dụng VIB - Nhận voucher 200.000đ
                mua hàng tại Phone Store</a>
              <a class="list-group-item list-group-item-action">
                <i class="bi bi-check-circle-fill text-success me-1"></i>Thu cũ đổi mới: Giá thu cao - Thủ tục nhanh
                chóng - Trợ giá tốt nhất</a>
            </div>
          </div>
          <div class="card mt-3">
            <h5 class="m-3 mb-0">Thông số kĩ thuật</h5>
            <div class="list-group m-3"> 
              <a class="list-group-item bg-gray fs-6 text-dark" aria-current="true">
                <div class="d-flex gap-3">
                  <div class="col-6">Kích thước màn hình</div>
                <div class="col-6">6.7 inches</div>
                </div>
              </a>
              <a class="list-group-item align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Công nghệ màn hình</div>
                <div class="col-6">Super Retina XDR OLED</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Camera sau</div>
                  <div class="col-6">Camera chính: 48MP, 24 mm, ƒ/1.78
                  Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2
                  Camera Tele: 12 MP</div>
                </div>
              </a>
              <a class="list-group-item align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Camera trước</div>
                  <div class="col-6">12MP, ƒ/1.9</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Chipset</div>
                  <div class="col-6">Apple A17 Pro 6 nhân</div>
                </div>
              </a>
              <a class="list-group-item align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Công nghệ NFC</div>
                  <div class="col-6">Có</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Dung lượng</div>
                  <div class="col-6">8Gb</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Bộ nhớ trong</div>
                  <div class="col-6">256Gb</div>
                </div>
              </a>
              <a class="list-group-item align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Pin</div>
                  <div class="col-6">4422 mAh</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Thẻ SIM</div>
                  <div class="col-6">2 SIM (nano‑SIM và eSIM)</div>
                </div>
              </a>
              <a class="list-group-item align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Hệ điều hành</div>
                  <div class="col-6">iOS 17</div>
                </div>
              </a>
              <a class="list-group-item bg-gray align-items-center">
                <div class="d-flex gap-3">
                  <div class="col-6">Độ phân giải màn hình</div>
                  <div class="col-6">2796 x 1290-pixel</div>
                </div>
              </a>
            </div>
            
          </div>
        </div>
      </div>
      {{-- <div class="card mt-3">
        <h4 class="m-3 text-center">Sản phẩm liên quan</h4>
        <div class="d-flex gap-3 mb-3">
          <div class="card align-items-center ms-4" style="width:240px;" ng-repeat="pro in products|filter:{category:product.category}:true| limitTo: 5">
            <img src="" class="w-85 border border-3 border-primary mt-3" alt="...">
            <div class="card-body">
              <a class="text-decoration-none" href=""><h5 class="card-title text-black">{{pro.name}}</h5></a>
              <div class="d-flex gap-3">
                <p class="card-text text-danger fw-bold">{{pro.price|number:0}}đ</p>
                <p class="text-decoration-line-through">26.650.000đ</p>
              </div>
              <div class="card bg-dark-subtle">
                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6 tháng</p>
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
          <!-- <div class="card align-items-center" style="width:240px;">
            <img src="../client/image/Iphone 11 Chính hãng VN.webp" class="w-85 border border-3 border-primary mt-3" alt="...">
            <div class="card-body">
              <h5 class="card-title">iPhone 11 Chính Hãng VN/A</h5>
              <div class="d-flex gap-3">
                <p class="card-text text-danger fw-bold">9.745.000đ</p>
                <p class="text-decoration-line-through">10.950.000đ</p>
              </div>
              <div class="card bg-dark-subtle">
                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6 tháng</p>
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
            <img src="../client/image/Iphone 12 Chính hãng VN.webp" class="w-85 border border-3 border-primary mt-3" alt="...">
            <div class="card-body">
              <h5 class="card-title">iPhone 12 Chính Hãng VN/A</h5>
              <div class="d-flex gap-3">
                <p class="card-text text-danger fw-bold">13.750.000đ</p>
                <p class="text-decoration-line-through">15.450.000đ</p>
              </div>
              <div class="card bg-dark-subtle">
                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6 tháng</p>
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
            <img src="../client/image/Iphone 13 Chính hãng VN.webp" class="w-85 border border-3 border-primary mt-3" alt="...">
            <div class="card-body">
              <h5 class="card-title">iPhone 13 Chính Hãng VN/A</h5>
              <div class="d-flex gap-3">
                <p class="card-text text-danger fw-bold">16.420.000đ</p>
                <p class="text-decoration-line-through">18.450.000đ</p>
              </div>
              <div class="card bg-dark-subtle">
                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6 tháng</p>
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
            <img src="../client/image/Iphone 13 Mini Chính hãng VN.webp" class="w-85 border border-3 border-primary mt-3"
              alt="...">
            <div class="card-body">
              <h5 class="card-title">iPhone 13 Mini Chính Hãng VN/A</h5>
              <div class="d-flex gap-3">
                <p class="card-text text-danger fw-bold">16.189.000đ</p>
                <p class="text-decoration-line-through">18.190.000đ</p>
              </div>
              <div class="card bg-dark-subtle">
                <p class="fs-7 m-1">Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kì hạn 3-6 tháng</p>
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
          </div> -->

        </div>
      </div> --}}
    </div>
    <footer class="container-fluid mt-3 bg-dark">
      <div class="container">
        <div class="d-flex align-items-center">
          <p class="text-white fs-4 me-5 mt-2">Đăng kí nhận tin</p>
          <form class="d-flex" role="search">
            <input class="form-control ms-5 w-300 rounded-0" type="search" placeholder="Search" aria-label="Search">
            <input class="btn btn-primary w-25 rounded-0" type="submit" value="Gửi">
          </form>
          <div style="margin-left: 480px;">
            <img src="../client/image/facebook.png" alt="" style="width: 30px;">
            <img src="../client/image/mess.png" alt="" style="width: 30px;">
            <img src="../client/image/tiktok.png" alt="" style="width: 30px;">
            <img src="../client/image/youtube.png" alt="" style="width: 30px;">
            <img src="../client/image/instagram.png" alt="" style="width: 30px;">
          </div>
        </div>
        <hr class="text-white m-0">
        <div class="d-flex gap-5 justify-content-between">
          <div class="text-white w-25">
            <img src="../client/image/logoHeader-removebg-preview(1).png" alt="" style="width: 200px;">
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
            <li>Liên hệ hợp tác kinh doanh</li>
            <li>Dịch vụ bảo hành mở rộng</li>
          </div>
          <div class="text-white">
            <p class="fs-5 mt-3">Tổng đài hỗ trợ miễn phí</p>
            <li>Gọi mua hàng: 0862810416</li>
            <li>Gọi khiếu nại: 0862810416</li>
            <li>Gọi bảo hành: 0862810416</li>
            <p class="fs-5 mt-3">Phương thức thanh toán</p>
            <div class="">
              <img src="../client/image/vnpay-logo.png" alt="">
              <img src="../client/image/momo_1.webp" alt="">
              <img src="../client/image/onepay-logo.webp" alt="">
              <img src="../client/image/zalopay-logo.webp" alt="">
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
<script>
  document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.getElementById('quantity');
            const decreaseButton = document.getElementById('decrease');
            const increaseButton = document.getElementById('increase');
            let quantity = parseInt(quantityInput.value, 10);

            decreaseButton.addEventListener('click', function () {
                if (quantity > 1) {
                    quantity -= 1;
                    quantityInput.value = quantity;
                }
                updateButtonState();
            });

            increaseButton.addEventListener('click', function () {
                quantity += 1;
                quantityInput.value = quantity;
                updateButtonState();
            });

            function updateButtonState() {
                // Disable the decrease button if quantity is 1
                decreaseButton.disabled = quantity <= 1;
            }

            updateButtonState(); // Initial check
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>