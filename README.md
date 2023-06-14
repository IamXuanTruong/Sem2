
# Sem2
bash
Copy code
# Tên dự án

Mô tả ngắn về dự án.

## Cài đặt

1. Clone repository về máy:

   ```bash
   git clone <repository_url>
Di chuyển vào thư mục dự án:

bash

cd <project_directory>
Cài đặt các phụ thuộc:

bash

composer install
Sao chép file .env.example thành file .env:

bash

cp .env.example .env
Tạo khóa ứng dụng:

bash

php artisan key:generate
Cấu hình database trong file .env.

Chạy migration để tạo bảng trong database:

bash

php artisan migrate
Sử dụng
Chạy dự án Laravel:

bash

php artisan serve
Truy cập ứng dụng qua địa chỉ sau trên trình duyệt: http://localhost:8000

Các lệnh thường sử dụng
Chạy test:

bash

php artisan test
Tạo migration mới:

bash

php artisan make:migration create_table_name --create=table_name
Tạo model mới:

bash

php artisan make:model ModelName
Tạo controller mới:

bash

php artisan make:controller ControllerName
Đóng góp
Mọi đóng góp vào dự

Giấy phép
MIT License

css

Vui lòng thay đổi `<repository_url>` thành URL của repository dự án Laravel của bạn và `<project_directory>` thành thư mục dự án trên máy tính của bạn. Bạn cũng có thể thêm các hướng dẫn cụ thể cho dự án của mình vào phần "Sử dụng" và mở rộng phần "Các lệnh thường sử dụng" tùy theo nhu cầu.
