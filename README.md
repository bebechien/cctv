# cctv thumbnail viewer

### 개요

Anran wifi CCTV camera를 사용하고 있는데, motion detect 기능이 있어서 h264로 만들어진 rawdata를 특정 ftp에 올려둘 수 있다. 몇달 돌리다 보니 데이터들이 많이 쌓여서 한눈에 보기 불편한 점이 있어 이를 개선하기 위한 작업이다.

### change history

##### [0.0.1] - 2016-05-04

최초 구현

### 작업 flow

##### 1. h264 에서 frame png와 thumbnail gif를 생성하는 shell script

input data : h264 파일들이 모여있는 root folder<br>
구조는 YYYY-MM-DD 밑에 channel 별로 폴더가 나뉘고 rec 밑에 실제 파일들이 존재

> 예시<br>
> 2016-05-04/01/rec/01.02.11-01.02.24[M][@9ccd][0].h264

##### 2. 생성된 이미지를 web server에 올리면 자동으로 보여주는 웹페이지

일단 간단히 php로 구현
