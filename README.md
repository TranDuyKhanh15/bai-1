# BAI TAP-3

## Câu 1. Ở trên repo hiện tại, git config local username và email

> git config --local user.name "DuyKhanh"

> git config --local user.email "tranduykhanh15022000@gmail.com"

![alt](./img/baitap3_1.png)

*** 

## Câu 2. Checkout master 1 branch là develop

> git checkout -b develop

![alt](./img/baitap3_15.png)

***

## Câu 3. Trên branch develop tạo 1 file demo.log, 1 file index.html với nội dung in ra dòng chữ “Hello world”. Làm thế nào để git không tracking tất cả file .log (dùng .gitignore). Sau đó tạo 1 commit add file index.html

tạo 1 file demo.log, 1 file index.html

> touch demo.log

> touch index.html

![alt](./img/baitap3_16.png)

file index.html với nội dung in ra dòng chữ “Hello world”

![alt](./img/baitap3_5.png)

git không tracking tất cả file .log

> git rm -r --cache *.log

![alt](./img/baitap3_2.png)

tạo 1 commit add file index.html

![alt](./img/baitap3_4.png)

***

## Câu 4. Sửa đổi nội dung trên file index.html sau đó làm thế nào để revert lại file index.html trước khi sửa đổi không dùng undo mà dùng lệnh git. 

revert lại file index.html

> git revert HEAD 

![alt](./img/baitap3_7.png)

Sau đó chỉnh sửa lại nội dung

![alt](./img/baitap3_22.png)

***

## Câu 5. Tạo 1 file demo.html với nội dung in ra dòng chưa “This is file demo”, tạo một commit mới add file demo.html và push code lên origin.

Tạo 1 file demo.html

> touch demo.html

nội dung in ra dòng chưa “This is file demo”

![alt](./img/baitap3_17.png)

tạo một commit mới add file demo.html

> git commit -m "add file demo.html"

![alt](./img/baitap3_8.png)

push code lên origin.

> git push origin develop

![alt](./img/baitap3_9.png)

***

## Câu 6. Sửa đổi lại nội dung file demo.html với nội dung “This is a demo file” như không tạo thêm một commit mới nào cả chỉ là thay thế commit cũ và push lại code lên origin

Sửa đổi lại nội dung file demo.html với nội dung “This is a demo file”

![alt](./img/baitap3_18.png)

không tạo thêm một commit mới nào cả chỉ là thay thế commit cũ và push lại code lên origin

add file demo.html 

> add demo.html

![alt](./img/baitap3_19.png)

commit -- anmend để chỉnh sửa commit trước đó

> git commit --amend

![alt](./img/baitap3_20.png)

Push -f để ghi dè lên commit trước đó

> git push -f 

![alt](./img/baitap3_21.png)
