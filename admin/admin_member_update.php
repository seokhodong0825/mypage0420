<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/mypage0420/db/db_connect.php';

session_start();
if ( isset( $_SESSION['userlevel'] ) && $_SESSION['userlevel'] != 1 )
 {
    echo( "
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        " );
    exit;
}

$num   = $_POST['num'];
$level = $_POST['level'];
$point = $_POST['point'];
//members 테이블에서 해당되는 num값을 찾아서 레벨값과 포인트값을 수정해라.
$sql = "update members set level=$level, point=$point where num=$num";
$result = mysqli_query( $con, $sql );

mysqli_close( $con );

if ( !$result ) {
    echo "
        <script>
            alert('수정실패함');
            history.go(-1);
        </script>
      ";

} else {
    echo "
        <script>
            alert('수정완료함');
            location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage0420/admin/admin.php';
        </script>
      ";
}
?>