# Capstone_Design_Hospital

복잡한 병원 절차를 도와주는 웹앱으로 예약, 문진표, 진료 절차의 현재 진행 상황, 찾아가는 길을 알려주는 웹


## 목차
1. 요구사항 명세서 (분석)
2. class diagram (설계)
3. erd (설계)
4. 테스트 케이스 (설계)
5. 실행 과정 (유지보수)



## 1. 요구사항 명세서 (분석)
![요구사항 명세서](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/acfaa278-86e2-4c0f-ae12-1a50d2534125)



## 2. class diagram (설계)
![class diagram](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/d3bdb43e-aa6c-4933-85d2-1a53d0aebbe1)



## 3. erd (설계)
![erd](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/9a210e04-d374-4081-95da-1e58e18bfd7b)



## 4. 테스트 케이스 (설계)
![테스트](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/9330734b-bdd7-44b2-849b-cf8a3e496ebb)
![테스트_1](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/e9891d3b-2d1e-4faa-8f3b-6c3f08b33bdf)
![테스트_2](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/55aade71-d025-49e4-9987-06d91ca36313)




보완해야 할 점 : 테스트 케이스 코드 작성 필요

## 5. 실행 과정 (유지보수)
5-1. 약관동의 : 약관에 동의하지 않으면 넘어가지지 않는다.

![image01](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/005d5d7e-9e48-4c75-a333-0c52a13a312c)

5-2. 회원가입 : 입력된 데이터는 DB에 보내진다.

![image02](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/103bc0b1-b082-4723-8e2d-d6bb0b2b41c1)

5-3. 로그인 : 입력된 데이터는 DB의 값과 일치하면 로그인 된다.

![image03](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/b7c85d6e-f8e7-40a2-87d2-5b3ca03eead5)

5-4. 문진표 : 예라는 응답이 있으면 예약은 진행되지 않는다.

![image04](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/b779667b-a47f-4611-bf64-5ae30834fb8e)

5-5. 예약 : 원하는 진료과, 진료교수, 진료희망날짜를 선택하면 DB의 데이터를 토대로 예약가능한 시간이 나타난다.

![image05](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/cbc3b562-3330-462b-a12d-7f3b3fc93225)

5-6. 예약확인 : 예약을 완료하면 본인의 예약확인 DB에 저장되고, 페이지에서 예약을 확인할 수 있다.

![image06](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/e6326231-21eb-47e1-96b8-e9f8b4b1187c)

5-7. 진행상황 : 진료 절차에 따른 안내를 한다. 문진표, 예약, 길찾기 버튼과 안내문이 있다.

![image07](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/bb917524-95b6-44f7-950f-1f8245ac6cc8)

5-8. 길찾기 : 자신의 위치와 목적지를 지도에 있는 번호를 토대로 입력해 찾아가는 길을 확인할 수 있다.

![image08](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/3f4d51d2-41e8-46f5-94bc-8d00e52d16cc)

5-9. 길찾기 결과 페이지

![image09](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/3b74c5c4-7cd7-435f-95c5-0706139c963f)

5-10. 병원측 예약확인 : DB에서 진료교수별 예약 정보를 받고, 예약된 환자의 정보를 받은 페이지다. 진료교수는 자신의 예약 리스트를 확인할 수 있다.

![image10](https://github.com/qkrqhdtn3/Capstone_Design_Hospital/assets/74765691/940e7a42-9e76-4a22-853a-230913a542bc)
