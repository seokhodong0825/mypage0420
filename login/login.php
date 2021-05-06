<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/mypage0420/db/db_connect.php";

    //전송된 post 데이타 체크
    $id   = input_set($_POST["id"]);
    $pass = input_set($_POST["pass"]);

    //**
    //CALL STORE PROCEDURE : ID, PASS CHECK
    //**
    $sql = "call signin('$id','$pass',@resultCode)";
    $result = mysqli_query($con, $sql);

    $sql = "select @resultCode";
    $out_result = mysqli_query($con, $sql);

    //$out_row["@resultCode"] 또는 $out_row[0] =0,-1,-2 결과값을 가져온다.
    $out_row = mysqli_fetch_array($out_result);
    $resultCode = $out_row[0];

    if( $resultCode == -1){
      alert_back("아이디 입력 에러!");
      exit;
    }else if($resultCode == -2){
      alert_back("패스워드 입력 에러!");
      exit;
    }else if($resultCode == 0 ){
      $row = mysqli_fetch_array($result);

      session_start();
      $_SESSION["userid"] = $row["id"];
      $_SESSION["username"] = $row["name"];
      $_SESSION["userlevel"] = $row["level"];
      $_SESSION["userpoint"] = $row["point"];

      echo("
              <script>
                location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage0420/index.php';
              </script>
            ");
    }//end of if
?>

<!-- // //멤버테이블에서 아이디 같은 레코드 추출-> $result
// //members table에서 id와 password를 보여줘라.
// $sql = "select * from members where id='$id' and  pass='$pass'";
// $result = mysqli_query( $con, $sql );
// //레코드 추출내용 갯수 파악, result set의 갯수
// $num_match = mysqli_num_rows( $result );
// //추출내용이 없으면 0 => false
// //num_match가 0이면 id와 password가 없으니 history.go, 1이면 login
// if ( !$num_match )
//  {
//     echo( "
//            <script>
//              window.alert('아이디와 패스워드 바르게 입력요망!');
//              history.go(-1);
//            </script>
//          " );
// } else {
//     //레코드 추출에서 첫번째 레코드를 *연관배열로 가져온다. $row['id']~~ $row['level']
//     $row = mysqli_fetch_array( $result );

//     //세션값을 할당한다.
//     //id, name, level, point를 세션 value에 입력한다.
//     session_start();
//     $_SESSION['userid'] = $row['id'];
//     $_SESSION['username'] = $row['name'];
//     $_SESSION['userlevel'] = $row['level'];
//     $_SESSION['userpoint'] = $row['point'];

//     mysqli_close( $con );

//     echo( "
//           <script>
//             location.href = 'http://{$_SERVER["HTTP_HOST"]}/mypage0420/index.php';
//           </script>
//         " );
// } -->