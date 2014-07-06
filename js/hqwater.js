//made while listening to 'croatian rhapsody'
//for middle RED indicator
$(window).load(function(){
            if($('#slide1').hasClass('active')){
                $('#indicator1').addClass("activated");
                $('#indicator2').removeClass("activated");
            }
            if($('#slide2').hasClass('active')){
                $('#indicator2').addClass("activated");
                $('#indicator1').removeClass("activated");
            }
});







//allow 'lockpage switching arrows' to scroll 


//$('.controlArrow.prev').animate( { "left": $(document).scrollLeft() + $('.box').offset().left +"px" } ); 




// push nav bar

$(window).load(function(){
        $menuLeft = $('.pushmenu-left');
        $nav_list = $('#nav_list');
        
        $nav_list.click(function() {
                $(this).toggleClass('actived');
                $('.pushmenu-push').toggleClass('pushmenu-push-toright');
                $menuLeft.toggleClass('pushmenu-open');
        });
});


//top bar active code
$(window).load(function(){
// jQuery 라이브러리를 사용.
    $('.make_key').click(function() {
        var _comment = $(this).attr('id'); 

        $.ajax({
            type: "POST", // POST형식으로 폼 전송
            url: "./idea_to_key.php", // 목적지
            data: ({lockid: _comment}),
        }); 
         
        return false;
    });
});

//top bar active code
$(window).load(function(){
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
    $("#nav li a").each(function(){
    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
    $(this).addClass("actived");
    })
});


// Login Form

$(window).load(function(){
    var button = $('#loginButton');
    var box = $('#loginBox');
    var form = $('#loginForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('actived');
        $('#loginContainer').toggleClass('actived');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#loginButton').length > 0)) {
            button.removeClass('actived');
            $('#loginContainer').removeClass('actived');
            box.hide();
        }
    });
});


//답키 달기 애니메이션
//1) 윈도우가 로드됬을때 실행 
$(window).load(function(){
    $('.babykey_area').hide();
    $('.babykey_modify_area').hide();




//2) show_babykey_input 클래스가 클릭됬을때 실행
    $('.show_babykey_input').click(function(e){
        var id2 = $(this).attr('id').slice(1);
       /*
        나머지 area들을 전부 날리기 위한 설정임. 지금 주석처리한 것은 이전의 코드.
        var id3 = $(this).attr('id').slice(13);
       
        
        $("#"+id2).toggle(200);//or just show instead of toggle
        $("#babykeymodify"+id3).hide(200);// hide modify form
        */
        $('.babykey_area').not("#"+id2).hide();
        $('.babykey_modify_area').hide();
        $("#"+id2).toggle(200);
    });

    $('.show_babykey_modify').click(function(e){
        var id4 = $(this).attr('id').slice(1);
        var id5 = $(this).attr('id').slice(14);

        $('.babykey_modify_area').not("#"+id4).hide();
        $('.babykey_area').hide();
        $("#"+id4).toggle(200);
        /* 얘도 마찬가지
        //alert('ID is: '+ id2);
        $("#"+id4).toggle(200);//or just show instead of toggle
        $("#babykeyinput"+id5).hide(200); // hide input form
        */
    });
    //test
});


//답키 달기 애니메이션 (idea)
//1) 윈도우가 로드됬을때 실행 
$(window).load(function(){
    $('.babyidea_area').hide();
    $('.babyidea_modify_area').hide();

//2) show_babykey_input 클래스가 클릭됬을때 실행
    $('.show_babyidea_input').click(function(e){
        var id2 = $(this).attr('id').slice(1);
       /*
        나머지 area들을 전부 날리기 위한 설정임. 지금 주석처리한 것은 이전의 코드.
        var id3 = $(this).attr('id').slice(13);
       
        
        $("#"+id2).toggle(200);//or just show instead of toggle
        $("#babykeymodify"+id3).hide(200);// hide modify form
        */
        $('.babyidea_area').not("#"+id2).hide();
        $('.babyidea_modify_area').hide();
        $("#"+id2).toggle(200);
    });

    $('.show_babyidea_modify').click(function(e){
        var id4 = $(this).attr('id').slice(1);
        var id5 = $(this).attr('id').slice(15);

        $('.babyidea_modify_area').not("#"+id4).hide();
        $('.babyidea_area').hide();
        $("#"+id4).toggle(200);
        /* 얘도 마찬가지
        //alert('ID is: '+ id2);
        $("#"+id4).toggle(200);//or just show instead of toggle
        $("#babykeyinput"+id5).hide(200); // hide input form
        */
    });
});



//답키 작성시 키 타입을 고르지 않고나 내용이 없을 경우 alert
//bla bla
/*

$(document).on('submit', 'form.babykey_area', function () {

	var id0 = $(this).attr('id').slice(1);


    var validate = true;
    var unanswered = new Array();
    var msg1=msg2= "";
    // Loop through available sets
    $('#babykey_type_'+id0).each(function () {
        // Question text
        var question = $(this).prev().text();
        // Validate
        if (!$(this).find('input').is(':checked')) {
            unanswered.push(question);
            validate = false;
        }
    });

    var key_content = $('input.babykeyinput_{$row['key_id']}').val(); 


	if (key_content=="") {
	    // textarea is empty or contains only white-space
	    msg1 = "Textarea is empty."; 
	    validate = false;
	    alert(msg1);
	}
	if (unanswered.length > 0) {
        msg2 = "Please select the type of the key."; 
        validate = false;
        alert(msg2);
    }
    return validate;
});
*/


//Lock 빈칸입력 submit견제
$(document).on('submit', 'form.newlock', function () {

    var validate0 = true; 
    var lock_content = $('textarea[name="lock"]:visible').val(); 
    	if (lock_content=="") {
	    // textarea is empty or contains only white-space
	    validate0 = false;
	    alert("Textarea is empty");
	   }
    return validate0;
});





//NEWKEY 작성시 키 타입을 고르지 않거나 내용이 없을 경 alert

// Delegate submit action
$(document).on('submit', 'form.newkeyarea', function () {

    var validate = true;
    var unanswered = new Array();
    var msg1=msg2= "";
    // Loop through available sets
    $('.newkey_key_type').each(function () {
        // Question text
        var question = $(this).prev().text();
        // Validate
        if (!$(this).find('input').is(':checked')) {
            unanswered.push(question);
            validate = false;
        }
    });

    var key_content = $('textarea[name="content"]:visible').val(); 


	if (key_content=="") {
	    // textarea is empty or contains only white-space
	    msg1 = "Textarea is empty."; 
	    validate = false;
	    alert(msg1);
	}
	if (unanswered.length > 0) {
        msg2 = "Please select the type of the key."; 
        validate = false;
        alert(msg2);
    }
    return validate;
});

//배경이미지 변경 함수
$(function() {

    $('#background_1').click(function() {
        $('body').css('background-image', 'url(./images/bg1.jpg)');
    });
    $('#background_2').click(function() {


        $('body').css('background-image', 'url(./images/bg2.jpg)');


        
    });
    $('#background_3').click(function() {
        $('body').css('background-image', 'url(./images/bg3.jpg)');
    });

});

