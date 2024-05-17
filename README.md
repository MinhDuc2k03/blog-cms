# CMS Laravel
Đề bài yêu cầu tạo một CMS với những tính năng CRUD cơ bản Thực hiện bởi: Trần Minh Đức



## Cài đặt

Step 1: Chạy `git clone https://github.com/MinhDuc2k03/blog-cms.git tênProject` trên TERMINAL

Step 2: Chạy `cd tênProject` hoặc mở folder 'tênProject'

Step 3: Chạy `composer install` và `npm install`

Step 4: Chạy `cp .env.example .env`

Step 4: Chạy `php artisan key:generate`

Step 5: Đổi tên trong file .env và chạy `php artisan migrate` để tạo database

Step 6: Chạy `php artisan storage:link`

Step 7: Chạy `php artisan db:seed --class=AdminSeeder`

Step 8: Bắt đầu server bằng `php artisan serve` ~~và `npm run dev`~~


### Đăng nhập vào tk admin
Tài khoản: admin@example.com<br>
Password: 12345


### Các route cho admin

 - /admin: Trang admin cho dashboard
 - /admin/post: Trang admin cho các bài viết
 - /admin/cagetory: Trang admin cho các mục
 - /admin/tag: Trang admin cho các tag
 - /admin/user: Trang admin cho các người dùng

 - /filament_admin: Trang admin cho dashboard làm bằng filament



## Features
- [X] Login, Logout
- [X] Create Post
- [X] Edit Post created by you
- [X] Edit Profile
- [X] View view count on posts
- [X] Admin Panel
  - [X] Dashboard
  - [X] User management and authorization
  - [X] CRUD for Post/Category/Tag/User
  - [X] Filter data
  - [X] Filament Admin Panel