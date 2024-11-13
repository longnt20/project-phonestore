<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
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
  </style>
</head>

<body>
  <div class="container-fluid">
    <header>
      <div class="container navbar justify-content-start">
       <a href="/"><img style="width: 200px; height: 100px;margin-right: 150px;" src="client/image/logoHeader-removebg-preview(1).png"
        alt=""></a>
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
                      <img src="client/image/logoHaMa.png" alt="" style="width: 100px;">
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
        @yield('content')
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
            <img src="image/facebook.png" alt="" style="width: 30px;">
            <img src="image/mess.png" alt="" style="width: 30px;">
            <img src="image/tiktok.png" alt="" style="width: 30px;">
            <img src="image/youtube.png" alt="" style="width: 30px;">
            <img src="image/instagram.png" alt="" style="width: 30px;">
          </div>
        </div>
        <hr class="text-white m-0">
        <div class="d-flex gap-5 justify-content-between">
          <div class="text-white w-25">
            <img src="client/image/logoHeader-removebg-preview(1).png" alt="" style="width: 200px;">
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
              <img src="image/vnpay-logo.png" alt="">
              <img src="image/momo_1.webp" alt="">
              <img src="image/onepay-logo.webp" alt="">
              <img src="image/zalopay-logo.webp" alt="">
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
<script src="../js/bootstrap.min.js"></script>

</html>
