<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="shortcut icon" href="/admin/static/img/icons/icon-48x48.png" /> 
<link href="/admin/static/css/app.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('path/to/theme-pagination.css') }}">
<style>
    .pagination {
        display: flex !important;
        justify-content: center; /* Canh giữa các nút phân trang */
        list-style: none; /* Bỏ dấu chấm/bullet ở danh sách */
        padding: 0;
        margin-top: 20px;
    }

    .pagination li {
        margin: 0 5px; /* Khoảng cách giữa các nút */
    }

    .pagination .page-item {
        display: inline-block;
    }

    .pagination .page-item.disabled .page-link {
        color: #ccc; /* Màu sắc cho các nút bị vô hiệu */
        pointer-events: none; /* Vô hiệu hóa nút */
    }

    .pagination .page-item .page-link {
        display: inline-block;
        padding: 8px 15px; /* Kích thước của nút */
        border: 1px solid #ddd; /* Viền xung quanh các nút */
        border-radius: 4px;
        text-decoration: none; /* Bỏ gạch chân */
        color: #007bff; /* Màu sắc cho các nút phân trang */
        background-color: #fff; /* Màu nền */
        transition: background-color 0.2s ease; /* Hiệu ứng hover */
    }

    .pagination .page-item .page-link:hover {
        background-color: #f1f1f1; /* Nền khi hover */
        text-decoration: none;
    }

    .pagination .page-item.active .page-link {
        color: white;
        background-color: #007bff; /* Màu nền cho trang hiện tại */
        border-color: #007bff;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
