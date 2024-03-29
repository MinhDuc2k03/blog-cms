# CMS Laravel
Đề bài yêu cầu tạo một CMS với những tính năng CRUD cơ bản Thực hiện bởi: Trần Minh Đức



## Cài đặt

Step 1: Chạy `git clone https://github.com/MinhDuc2k03/blog-cms.git tênProject` trên TERMINAL

Step 2: Chạy `cd tênProject` hoặc mở folder 'tênProject'

Step 3: Chạy `composer install` và `npm install`

Step 4: Chạy `cp .env.example .env`

Step 4: Chạy `php artisan key:generate`

Step 5: Đổi tên trong file .env và chạy `php artisan migrate`

Step 6: Bắt đầu server bằng `php artisan serve` và `npm run dev`


### Đăng nhập vào tk admin
Tài khoản: admin@example.com
Password: 12345


### Các route cho admin

 - /admin/post: Trang admin cho các bài viết
 - /admin/cagetory: Trang admin cho các mục
 - /admin/tag: Trang admin cho các tag