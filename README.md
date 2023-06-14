# điều kiện tiên quyết bạn phải cài NodeJS mới có thể sử dụng lệnh npm...
# Để sử dụng project bạn cần chạy các lệnh sau trong terminal của project:
  - npm install -g json-server : để cài đặt json-server cho việc mock api
  - npm install axios : axios là thư viện dùng để thực hiện các yêu cầu HTTP trong project
  - cd data : chuyển tới folder data để câu lệnh dưới lấy file db.json đề tạo mock api 
  - json-server --watch db.json --port 7777
  - run file index bằng live-server ...