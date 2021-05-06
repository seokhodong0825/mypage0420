<?php
//timezone을 아시아로 설정.
date_default_timezone_set( 'Asia/Seoul' );
$server_name = 'localhost';
$user_name = 'root';
$pass = '123456';
$db_name = 'sample';

//database와 연동시키는 키.
$con = mysqli_connect( $server_name, $user_name, $pass );
//sample이 없다면 database에서 create해라.
$query = 'create database if not exists sample';
// die( $con->error ) :쿼리문실행하고 결과값이 오류가나오면 프로그램을 멈춤, 에러메시지 출력
// $con->query( $query ) : 쿼리문 실행
$result = $con->query( $query ) or die( $con->error );

// 데이타베이스 선택( sample 선택 )
$con->select_db( $db_name ) or die( $con->error );

// 결과가 잘못 되었을경우 경고해주고 뒤로가라(history.go(-1)).
function alert_back( $message ) {
    echo( "
			<script>
			alert('$message');
			history.go(-1)
			</script>
			" );
}

//고객이 양식에 맞지 않은 data 요청 시 방어하는 함수.
function input_set( $data ) {
    $data = trim( $data );
    $data = stripslashes( $data );
    $data = htmlspecialchars( $data );
    return $data;
}
?>