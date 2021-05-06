<?php
// session은 슈퍼글로벌변수이고, 이 값들은 login.php에서 로그인할 때 등록이됨.
session_start();
if ( isset( $_SESSION['userid'] ) ) $userid = $_SESSION['userid'];
else $userid = '';
if ( isset( $_SESSION['username'] ) ) $username = $_SESSION['username'];
else $username = '';
if ( isset( $_SESSION['userlevel'] ) ) $userlevel = $_SESSION['userlevel'];
else $userlevel = '';
if ( isset( $_SESSION['userpoint'] ) ) $userpoint = $_SESSION['userpoint'];
else $userpoint = '';
?>

<div id='top'>
    <h3>
        <a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/index.php"><span>AOMG</span></a>
    </h3>
    <ul id='top_menu'>

        <?php
//로그인을 안했을 때는 회원가입, 로그인 화면이 보이고, 로그인을 하면 로그아웃, 정보수정, 회원탈퇴 화면이 보인다. 
if ( !$userid ) {
    ?>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/member/member_form.php">회원 가입</a> </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/login/login_form.php">로그인</a></li>
        <?php
} else {
    $logged = "{$username} ({$userid})님[Level:{$userlevel}, Point: {$userpoint}]";
    ?>
        <li>
            <?php echo $logged ?>
        </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/login/logout.php">로그아웃</a> </li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/member/member_modify_form.php">정보 수정</a></li>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/member/member_delete_form.php">회원 탈퇴</a></li>
        <?php
}
?>

        <?php
        // level 이 1이면 관리자모드를 켤 수 있다.
if ( $userlevel == 1 ) {
    ?>
        <li> | </li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/admin/admin.php">관리자 모드</a></li>
        <?php
}
?>

    </ul>   
</div>
<div id='menu_bar'>
    <ul>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/mypage0420/index.php"><span>HOME</span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage0420/memo/message_box.php"><span>쪽지</span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage0420/board/board_list.php"><span>게시판</span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage0420/image_board/board_list.php"><span>ARTISTS</span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage0420/notice/notice_list.php"><span>공지사항</span></a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/mypage0420/free/list.php"><span>COMMUNITY</span></a></li>
    </ul>
</div>