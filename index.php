<? session_start(); ?>
<?
include "./inc/db/dbset.php"
?>
<?

ob_start();
setcookie("dbset", $dbset);
setcookie("db", $db);
setcookie("host", $host);
setcookie("user", $user);
setcookie("pass", $pass);
ob_end_clean();


?>



<!DOCTYPE html>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Bounce!130</title>
    <!-- meta -->
	<meta name="author" content="No.B 유건욱,황예진,엄해연,홍수지,전지혜" />
    <meta name="description" content="2022 계원예대 디지털미디어디자인과 졸업전시회" />
    <meta property="og:title" content="Bounce!130" />
    <meta property="og:url" content="digital-media.kr/degreeshow/2022" />
    <meta property="og:image" content="#" />
    <meta property="og:description" content="2022 계원예대 디지털미디어디자인과 졸업전시회 Bounce!130" />
	<meta name="keywords" content="Kaywon, DigitalMedia, 계원예대,디지털미디어디자인, 디미디, 바운스, bounce!130, 졸업전시회, 졸업전시, 졸업">
    <meta name="twitter:card" content="2022 계원예대 디지털미디어디자인과 졸업전시회 Bounce!130" />
    <meta name="twitter:title" content="Bounce!130" />
    <meta name="twitter:url" content="digital-media.kr/degreeshow/2022" />
    <meta name="twitter:image" content="#" />
    <meta name="twitter:description" content="2022 계원예대 디지털미디어디자인과 졸업전시회 Bounce!130" />
	
	<!-- favicon -->
	<link rel="icon" href="./img/header/favicon/favicon_32.ico" sizes="32x32" />
	<link rel="apple-touch-icon-precomposed" href="./img/header/favicon/Bounce!130-touch-icon.png">
    <script src="./inc/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="./header.js"></script>
    <link href="index.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> -->

</head>


<body>
<header>
		<nav class="inner">
			<h1 class="w_logo"><a href="http://www.digital-media.kr/degreeshow/2022"><img src="./img/header/logo.png" alt=""></a></h1>
			<h1 class="m_logo"><a href="http://www.digital-media.kr/degreeshow/2022"><img src="./img/header/logo2.png" alt=""></a></h1>
	
			<ul class="navList">
				<li><a href="http://www.digital-media.kr/degreeshow/2022/projects_basic.html">Project!28</a></li>
				<li><a href="http://www.digital-media.kr/degreeshow/2022/profile_basic.html">Student!130</a></li>
			</ul>
			<div class="hamburgerBtn" data-menu="4">
				<div class="icon"></div>
			</div>
			<div class="menu blind">
				<div class="menuAllWrap">

					<ul class="menuWrap1">
						<li class="menu01">
							<a href="http://www.digital-media.kr/degreeshow/2022/curriculum.html">
								<div>01</div>Curriculum
							</a>
						</li>
						<li class="menu02">
							<a href="http://www.digital-media.kr/degreeshow/2022/projects_basic.html">
							<div>02 <span> 28 </span> </div>
							Project
							</a>
						</li>
						<li class="menu03">
							<a href="http://www.digital-media.kr/degreeshow/2022/profile_basic.html">
								<div>03 <span> 130 </span></div>
								Student
							</a>
						</li>
					</ul>

					<ul class="menuWrap2">
						<li class="menu04">
							<a href="http://www.digital-media.kr/degreeshow/2022/sticker.html">
								<div>04</div>Sticker
							</a>
						</li>
						<li class="menu05">
							<a href="#">
								<div>05</div>Guestbook
							</a>
						</li>
						<li class="menu06">
							<a href="http://digital-media.kr/degreeshow/2022/behind.html">
								<div>06</div>Behind
							</a>
						</li>
					</ul>

				</div>


			</div>
		</nav>
	</header>
    <!-- login  -->
    <div class="container">
        <section class="ad">
            <div class="admin_pw">
                <input type="text" class="form_control" id="pw" placeholder="Enter Admin Password" name="pw">
            </div>
            <div class="login_">
                <button type="Button" class="btn" onClick="login()">Login</button>

                <?
                if ($_SESSION['isAdmin'] == 1) {
                ?>
                <button type="Button" class="btn" onclick="location.href='./back/logout.php'">logout</button>
                <?
                }
                ?>
            </div>
        </section>

        <section class="write_section">
            <!-- write zone  -->
            <form name="writeForm" method="post" action="./back/writeContents.php">
                <div class="form_top">
                    <p id="now_date">
                        <!-- 실제 DATE가 들어갈 내용 -->
                    </p>
                    <input type="text" class="form_control" id="nickname" placeholder="이름을 입력해 주세요" name="nickname">
                </div>
                <div class="form_bottom">
                    <input type="text" class="form_control" id="contents" placeholder="응원의 메시지를 남겨 주세요" name="contents">
                    <!-- <button type="Button" class="btn" onClick="send()">SEND</button> -->
                    <button type="Button" class="btn" onClick="send()">SEND</button>
                </div>
            </form>


        </section>

        <!--  방명록 컨텐츠가 추가되는 영역 -->
        <div id="content_list">

            <div class="content_list" id="content_list0"></div>
            <div class="content_list" id="content_list1"></div>
            <div class="content_list" id="content_list2"></div>
            <div class="content_list" id="content_list3"></div>

        </div>
        


        <!-- <div class="">
            <button type="Button" class="btn" onClick="getContentsList()">데이터 불러오기</button>
        </div>
        <div class="">
            <button type="Button" class="btn" onClick="deleteContents(1)">데이터 삭제</button>
        </div> -->

    </div>



    <script>
    //게시글 작성
    function send() {
        var url = "./back/getContentsList.php";
        //Form 안의 input 들을 Back으로 Submit
        var writeForm = document.writeForm;
        var nickname = document.getElementById("nickname").value;
        var contents = document.getElementById("contents").value;
        if (nickname == "") {
            alert("닉네임을 입력해 주세요.");
            return false;
        } else if (contents == "") {
            alert("내용을 입력해 주세요.");
            return false;
        } else {
            writeForm.submit();
        }

    }

    //로그인
    function login() {
        //호출할 URL 지정
        var url = "./back/login.php";

        //입력된 패스워드를 Javascript 변수에 저장
        var pw = document.getElementById("pw").value;

        //password의 불필요한 공백 제거
        pw = pw.trim();

        // 페스워드 입력값 체크
        if (pw.length == 0) {
            alert('패스워드를 입력하지 않았습니다.');
            return;
        }
        //정상적으로 패스워드가 입력된 경우
        else {

            //loginInfo라는 배열 생성
            var loginInfo = [];

            //배열에 패스워드 할당 
            loginInfo.push(pw); // [1] pw

            //생성된 배열을 json 형식으로 변환
            var jsonString = JSON.stringify(loginInfo);

            $.ajax({ //jQuery ajax를 사용하기 위한 메서드
                type: "POST",
                dataType: 'json',
                url: url,
                data: {
                    data: jsonString
                },
                cache: false,

                success: function(data) {
                    if (data != 'empty') {
                        $.each(data, function(key, val) {
                            if (val.state == "suc") {
                                alert("관리자 로그인 성공");
                            } else {
                                alert("잘못된 암호 입력");
                            }
                            location.reload();
                        });
                    }
                },
                error: function(data) {
                    alert("error:잘못된 요청입니다.");
                }
            });
        }
    }




//게시글 리스트 불러오기
function getContentsList(){
    //호출할 URL 생성
	var url = "./back/getContentsList.php";
    var source="";
    var j =0;
    
    $.ajax({ //jQuery ajax를 사용하기 위한 메서드
        type: "POST",
        dataType:'json',
        url: url,
        cache: false,
        success:function(data){
            if(data != 'empty'){
                $.each(data, function(key, val){
                    // 받아온 데이터에서 필요한 값만 분리
                    // 데이터 레코드(줄) 수만큼 반복 수행
                    for(var i = 0; i < val.length; i++){
                        if(val[i] == "undefined" ){
                            break;   
                        }else{
                            source += ' <div class="get_box">';
                            source += '     <div class="text">'+ val[i].contents + '</div>';
                            source += '     <p class="user_name">'+val[i].nick +'</p>';
                            source += '     <p class="user_date">' +val[i].regDate + '</p>';
                            if ("<?= $_SESSION['isAdmin'] ?>" != "") {
                                source += '     <button onclick=deleteContents('+ val[i].id+') id="delete"> X </button>';
                            }; 
                            source += ' </div>';
                            while(j < $(".content_list").length){
                                document.getElementById("content_list"+j).innerHTML += source;
                                j++;
                                source = "";
                                if(j >= 4){
                                    j = 0;
                                    break;
                                } else {
                                    break;
                                }
                            }
                            
                        }

                                
                    }
                    console.log(source);
                    console.log($(".get_box"));
                    for(var i = 0; i < $(".get_box").length; i++){
                        var randomColor = ["#ff004e", "#FFDD2D", "#A533F6", "#05C360", "#0066FF"];
                        var Pick = Math.floor(Math.random() * randomColor.length);
                        console.log(Pick);
                        //$(".get_box").css("background", "#FFDD2D");
                        $(".get_box").eq(i).addClass('box'+Pick);
                    }
                    // document.getElementById("get_section1").innerHTML = source;
                });
            }
                                    // 아이디, 닉네임, 내용, 날짜
                        // console.log(val[i].id);
                        // console.log(val[i].nick);
                        // console.log(val[i].contents); 
                        // console.log(val[i].regDate);
                        
        },
        error:function(data){
            alert("error:잘못된 요청입니다.");
        }
    });
   
}



    //게시글 삭제, contents_id가 게시글 번호(ID)
    function deleteContents(contents_id) {

        if ("<?= $_SESSION['isAdmin'] ?>" == "") {
            alert("삭제는 관리자만 가능합니다.");
            return false;
        };
        //호출할 URL 생성
        var url = "./back/deleteContents.php";

        var submitData = [];

        submitData.push(contents_id);

        //생성된 배열을 json 형식으로 변환
        var jsonString = JSON.stringify(submitData);

        $.ajax({ //jQuery ajax를 사용하기 위한 메서드
            type: "POST",
            dataType: 'json',
            url: url,
            data: {
                data: jsonString
            },
            cache: false,

            success: function(data) {
                if (data != 'empty') {
                    $.each(data, function(key, val) {
                        if (val.state == "success") {
                            alert("게시글이 삭제되었습니다.");
                        } else {
                            alert("존재하지 않는 게시글입니다.");
                        }
                        location.reload();
                    });
                }
            },
            error: function(data) {
                alert("error:잘못된 요청입니다.");
            }
        });

    }
    </script>
    <script>
    $(document).ready(function() {
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        document.getElementById("now_date").innerHTML = year + " - " + month + " - " + day;

        
        getContentsList();   
        
    })
    </script>

</body>

</html>