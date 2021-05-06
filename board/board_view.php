<!DOCTYPE html>
<html>	
	<head>
		<meta charset="utf-8">
		<title>AOMG Page</title>
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage0420/css/common.css">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage0420/board/css/board.css">
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/mypage0420/board/js/board.js"></script>
		<script src="http://<?= $_SERVER["HTTP_HOST"] ?>/mypage0420/js/common.js" defer></script>
		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage0420/header.php"; ?>
		</header>
		<section>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage0420/main_img_bar.php"; ?>
			<div id="board_box">
				<h3 class="title">
					게시판 > 내용보기
				</h3>
                <?php
                    if (!$userid) {
                        echo("<script>
							alert('로그인 후 이용해주세요!');
							history.go(-1);
							</script>
						");
                        exit;
                    }

                    include_once $_SERVER['DOCUMENT_ROOT'] . "/mypage0420/db/db_connect.php";
                    $num = $_GET["num"];
                    $page = $_GET["page"];
					//글의 번호를 가져와서 전체를 조회해주는 쿼리문.
                    $sql = "select * from board where num=$num";
                    $result = mysqli_query($con, $sql);
					//정렬을 통해 데이터를 가져온다.
                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
                    $name = $row["name"];
                    $regist_day = $row["regist_day"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $file_name = $row["file_name"];
                    $file_type = $row["file_type"];
                    $file_copied = $row["file_copied"];
                    $hit = $row["hit"];
					//content안의 내용에서 공백과 줄바꿈을 할 수 있도록 설정.
                    $content = str_replace(" ", "&nbsp;", $content);
                    $content = str_replace("\n", "<br>", $content);
					//조회수 생성 로직(userid와 id가 맞지 않을 때 hit를 1씩 올린다.)
                    if ($userid !== $id) {
                        $new_hit = $hit + 1;
						//num이라는 칼럼에 new_hit를 update를 해라.
                        $sql = "update board set hit=$new_hit where num=$num";
                        mysqli_query($con, $sql);
                    }
                ?>
				<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?= $subject ?></span>
						<span class="col2"><?= $name ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?php
                            if ($file_name) {
                                $real_name = $file_copied;
                                $file_path = "./data/" . $real_name;
                                $file_size = filesize($file_path);  //파일사이즈를 구해주는 함수

                                echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                            }
                        ?>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button>
					</li>
					<li>
						<form action="board_form.php" method="post">
							<button>수정</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="modify">
						</form>
					</li>
					<li>
						<form action="dmi_board.php" method="post">
							<button>삭제</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="delete">
						</form>
					</li>
					<li>
						<button onclick="location.href='board_form.php'">글쓰기</button>
					</li>
				</ul>
			</div> <!-- board_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/mypage0420/footer.php"; ?>
		</footer>
	</body>
</html>
