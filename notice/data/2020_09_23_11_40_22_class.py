# 클래스 : 반복되는 불필요한 소스코드를 최소화 하ㅕㄴ서
#           현실 세계의 사물을 컴퓨터 프로그래밍 상에서
#           쉽게 표현할 수 있도록 해주는 프로그래밍 기술

#클래스를 이용하여 현실세계의 사물의 특성을 정의 할수있다
#자동차 클래스를 프로그래밍 안에서 생동감\

# 인스턴스 : 클래스로 정의된 객체를 프로그램 상에서 이용할 수 있게 만든 변수

# 클래스의 멤버 : 클래스 내부에 포함되는 변수
# 클래스의 함수 : 클래스 내부에 포함되는 함수, 메소드라고 부릅니다

class Car:
    #클래스의 생성자
    def __init__(self, name, color):
        self.name = name    #클래스의 멤버
        self.color = color  #클래스의 멤버
        # 클래스가 생성됨가 동시에 매개변수로 넘어온 네임과 칼라를 해당 인스턴스에 멤버변수로 설정을 하겠다
    #클래스 소멸자
    def __del__(self):
        print("인스턴스를 소멸시킨다")
    #클래스의 메소드
    def show_info(self):
        print("이름:", self.name, "/ 색상:", self.color)
    #Setter 메소드
    def set_name(self,name):
        self.name=name

car1=Car("소나타", "빨간색")
car1.set_name("아반떼")
print(car1.name,"을 구매했습니다")
del car1

#상속:다른 클래스의 멤버 변수와 메소드를 물려받아 사용하는 기법
#부모와 자식관계가 존재합니다
#자식클래스:부모클래스를 상속받은 클래스
class Unit:
    def __init__(self,name,power):
        self.name=name
        self.power=power
    def attack(self):
        print(self.name,"이(가) 공격을 수행합니다. 전투력:",self.power)

unit=Unit("홍길동",343)
unit.attack()
class Monster(Unit):
    def __init__(self,name,power,type):
        self.name=name
        self.power=power
        self.type=type

monster=Monster("슬라임",10,"초급")
monster.attack()