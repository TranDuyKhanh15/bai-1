# BÀI TẬP DOCKER

## Câu 1. Build 1 service php (https://hub.docker.com/_/php), 1 serivce nginx (https://hub.docker.com/_/nginx) để cho thể show được trang php info lên web bằng docker

* Tạo file php.Dockerfile và nội dung.

> touch php.Dockerfile

![alt](./images/Selection_001.png)

* Tạo file nginx.Dockerfile và nội dung.

> touch nginx.Dockerfile

![alt](./images/Selection_002.png)

* Tạo file docker-compose.yml và thêm 2 service php và nginx vào.

> touch docker-compose.yml

![alt](./images/Selection_003.png)

* Tạo file nginx.conf và nội dung.

> touch nginx.conf

![alt](./images/Selection_004.png)

* Chạy lệnh docker-compose up --build để chạy docker.

> docker-compose up --build

* Truy cập localhost:3030 để kiểm tra.

![alt](./images/Selection_005.png)


*** 

## Câu 2. Thêm 1 service mysql (https://hub.docker.com/_/mysql), viết một chương trình php connect đến service mysql


* Tạo file sql.Dockerfile và nội dung.

> touch sql.Dockerfile

![alt](./images/Selection_006.png)

* Thêm service db vào file docker-compose.yml, tạo environment(môi trường) cho sql.

![alt](./images/Selection_007.png)

* Chỉnh sửa file php để kiểm tra kết nối với mysql.

![alt](./images/Selection_008.png)

***

## Câu 3. Thêm 1 service mailhog (https://hub.docker.com/r/mailhog/mailhog/), tạo một form có thể nhập nhiều email và sau đó submit  những email đã nhập vào 1 table và gửi  1 template mail giới thiệu về bản thân đến những email đó. Dùng mailhog để tổ chức làm server mail để testing

### Thêm 1 service mailhog và adminer.
* Tạo file mailhog.Dockerfile và nội dung.

> touch mailhog.Dockerfile

![alt](./images/Selection_009.png)

* Tạo file adminer.Dockerfile và nội dung.

> touch adminer.Dockerfile

![alt](./images/Selection_010.png)

* Thêm 2 service adminer và mailhog vào file docker-compose.yml.

![alt](./images/Selection_011.png)

### Tạo một form có thể nhập nhiều email.

* Chỉnh sửa file php.

![alt](./images/Selection_012.png)

### submit những email đã nhập vào 1 table và gửi 1 template mail giới thiệu về bản thân đến những email đó.

* Tạo Folder init, trong Folder init tạo 1 file init.sql để tạo bảng cho mysql

![alt](./images/Selection_013.png)

![alt](./images/Selection_014.png)

* Thêm volumes vào sevice db để kết nối file init.sql.

![alt](./images/Selection_015.png)

* Thêm đoạn jquery vào register.php để sử lý khi submit.

![alt](./images/Selection_018.png)

* Download PHPMailer để  gửi email.

> https://github.com/PHPMailer/PHPMailer/tree/master/src
 
![alt](./images/Selection_016.png)

* Tạo file sendEmail.php trong Folder server để sử lý.

![alt](./images/Selection_017.png)

* Thêm đoạn code để sử dụng PHPMailer.

![alt](./images/Selection_019.png)

* Thêm đoạn code để gửi nội dung tới email khác.

![alt](./images/Selection_020.png)

* Chúng ta lọc array bằng lệnh foreach, sau đó gửi danh sách email đã nhập lên adminer và mailhog.

![alt](./images/Selection_021.png)

### Kiểm tra 

* Nhập dữ liệu vào form và submit để kiểm tra.

![alt](./images/Selection_022.png)

* Vào mailhog để kiểm tra đã nhận được email chưa.

![alt](./images/Selection_023.png)

* Vào adminer để kiểm tra đã thêm email vào bảng chưa.

![alt](./images/Selection_024.png)
