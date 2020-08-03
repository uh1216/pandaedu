<?php

/*
  Plugin Name:myplugin
  Plugin URL:http://13.125.76.117
  Description:Template for createing new plugin
  Version:0.1
  Author:user
  Author URL:http://user@example.com
  License:GPL2
*/

/**
 *HtmlForm
 */

add_shortcode('mailform','custom_form_creation');
    function custom_form_creation(){
?>

 

  <div class="tbox1">
    

	<p>원하는 교과를 선택해 주세요(중복선택가능)</p>
    <div class="button1">
        <button class="grade" value="0">수학,과학</button>
        <button class="grade" value="0">실과,미술</button>
        <button class="grade" value="0">영어,국어</button>
        <button class="grade" value="0">사회,도덕</button>
        <button class="grade" value="0">체육,창체</button>
       
    </div>
  </div>  
  
  <script>
    jQuery(document).ready(function() {
        jQuery('.grade').on('click', function() {
          var cli = jQuery(this).attr('value');
          if(cli == '0') {
            jQuery(this).css("background-color", "#23a3a7");
			jQuery(this).css("color", "white");
            jQuery(this).attr('value', '1');
          }
          else {
            jQuery(this).css("background-color", "white")
			jQuery(this).css("color", "black");
            jQuery(this).attr('value', '0');
          }
         });
      });
  </script>

  <div class="tbox2">
    <div class="tboxt2">수업준비 어떻게 계획하실건가요?</div>
    <br>
      <label class="box-radio-input">
        <input type="radio" name="radio1" value="1" class="sum">
        <div>타교과 연계중심의 활동</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio1" value="2" class="sum">
        <div>프로젝트형 수업</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio1" value="3" class="sum">
        <div>실습위주의 노작활동</div></label>  
      <label class="box-radio-input">
        <input type="radio" name="radio1" value="4" class="sum">
        <div>문제해결형 탐구수업</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio1" value="5" class="sum">
        <div>결과중심의 객관주의 수업</div></label>
  </div>

  <div class="tbox3">
    <div class="tboxt2">가르치고 싶은 기능과 역량이 있나요?</div>
    <br>
    <label class="box-radio-input">
        <input type="radio" name="radio2" value="1" class="sum">
        <div>창의 융합적 역량</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio2" value="2" class="sum">
        <div>문제 해결 역량</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio2" value="3" class="sum">
        <div>감수성 역량</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio2" value="4" class="sum">
        <div>정보 처리 역량</div></label>
      <label class="box-radio-input">
        <input type="radio" name="radio2" value="5" class="sum">
        <div>과목에 대한 흥미증진</div></label>
  </div>      

  <!--<div class="tbox4">
	    합계 : <span id="total"></span>
  </div>-->

  <script>
    jQuery(document).ready(function(){
      jQuery('.sum').click(function(){
        var total = 0;
        jQuery('.sum:checked').each(function(){
          total += parseInt(jQuery(this).val());
          });
          
        jQuery('#total').text(total);

    if(total<=7){
        jQuery(".hello").on("click", function() {

        var url = "http://m.54.180.73.119.xip.io/result";
        jQuery(location).attr('href',url);
        });
    }

    if(total>=8){
        jQuery(".hello").on("click", function() {

        var url = "http://m.54.180.73.119.xip.io/result";
        jQuery(location).attr('href',url);
        });
    }

      });
    });
  </script>

  <div class="tbox5">
    <p style="font-size:20px; text-align: center; margin-bottom: 25px;">점수를 입력해주세요(7점만점)</p>
    <div class="rangebox">
	  <p>활동성</p>    
	<input class="range1" type="range" min = "10" max = "70" step="10">
	<br>
	<div class="bar1" value="0">전혀 아니다</div>
	<div class="bar1" value="0">수학,과학</div>
	<div class="bar1" value="0">수학,과학</div>
	<div class="bar1" value="0">수학,과학</div>
	<div class="bar1" value="0">수학,과학</div>
	<div class="bar1" value="0">수학,과학</div>
	<div class="bar1" value="0">매우 그렇다</div>
    </div>

    <div class="rangebox">
	  <p>연계성</p>
      <input class="range2" type="range" min = "10" max = "70" step="10">
	<br>
	<div class="bar2" value="0">전혀 아니다</div>
	<div class="bar2" value="0">수학,과학</div>
	<div class="bar2" value="0">수학,과학</div>
	<div class="bar2" value="0">수학,과학</div>
	<div class="bar2" value="0">수학,과학</div>
	<div class="bar2" value="0">수학,과학</div>
	<div class="bar2" value="0">매우 그렇다</div>
    </div>
    

    <div class="rangebox">
	  <p>다양성</p>
     <input class="range3" type="range" min = "10" max = "70" step="10">
	<br>
	<div class="bar3" value="0">전혀 아니다</div>
	<div class="bar3" value="0">수학,과학</div>
	<div class="bar3" value="0">수학,과학</div>
	<div class="bar3" value="0">수학,과학</div>
	<div class="bar3" value="0">수학,과학</div>
	<div class="bar3" value="0">수학,과학</div>
	<div class="bar3" value="0">매우 그렇다</div>
    </div>
    </div>
  </div>  

  <script>
    jQuery('.starRev span').click(function(){
    jQuery(this).parent().children('span').removeClass('on');
    jQuery(this).addClass('on').prevAll('span').addClass('on');
    return false;
    });
  </script>

  <script>
    jQuery('.starRev span').click(function(){
    jQuery(this).parent().children('span').removeClass('on');
    jQuery(this).addClass('on').prevAll('span').addClass('on');
    return false;
    });
  </script>

  <script>
    jQuery('.starRev span').click(function(){
    jQuery(this).parent().children('span').removeClass('on');
    jQuery(this).addClass('on').prevAll('span').addClass('on');
    return false;
    });
  </script>


  <div class="tbox6">
    <div>난이도</div>
    <br>
      <label class="box-radio-input2">
        <input type="radio" name="rad" value="1" class="sum2">
        <span>아주 쉬움</span></label>
      <label class="box-radio-input2">
        <input type="radio" name="rad" value="1" class="sum2">
        <span>쉬움</span></label>
      <label class="box-radio-input2">
        <input type="radio" name="rad" value="1" class="sum2">
        <span>보통</span></label>
      <label class="box-radio-input2">
        <input type="radio" name="rad" value="1" class="sum2">
        <span>복잡함</span></label>
  </div>

  <script>
    jQuery(document).ready(function(){
      jQuery('.sum2').click(function(){
        var total = 0;
        jQuery('.sum2:checked').each(function(){
          total += parseInt(jQuery(this).val());
          });
          
        jQuery('#total').text(total);
      });
    });
  </script>

  <div class="tbox7">
    <div>평가방법</div>
    <br>
      <label class="box-radio-input3">
        <input type="radio" name="rad2" value="1" class="sum3">
        <span>포트폴리오</span></label>
      <label class="box-radio-input3">
        <input type="radio" name="rad2" value="1" class="sum3">
        <span>관찰</span></label>
      <label class="box-radio-input3">
        <input type="radio" name="rad2" value="1" class="sum3">
        <span>지필</span></label>
      <label class="box-radio-input3">
        <input type="radio" name="rad2" value="1" class="sum3">
        <span>보고서</span></label>
  </div>      

  <script>
    jQuery(document).ready(function(){
      jQuery('.sum3').click(function(){
        var total = 0;
        jQuery('.sum3:checked').each(function(){
          total += parseInt(jQuery(this).val());
          });
          
        jQuery('#total').text(total);
      });
    });
  </script>

  <br><br>
  <button class="hello">자료 검색하기</button>

<?php
}
?>
