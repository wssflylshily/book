@extends('master')

@include('component.loading')

@section('title', '登录')

@section('content')
<div class="weui_cells_title"></div>
<div class="weui_cells weui_cells_form">
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">帐号</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="tel" placeholder="邮箱或手机号"/>
      </div>
  </div>
  <div class="weui_cell">
      <div class="weui_cell_hd"><label class="weui_label">密码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="tel" placeholder="不少于6位"/>
      </div>
  </div>
  <div class="weui_cell weui_vcode">
      <div class="weui_cell_hd"><label class="weui_label">验证码</label></div>
      <div class="weui_cell_bd weui_cell_primary">
          <input class="weui_input" type="number" placeholder="请输入验证码"/>
      </div>
      <div class="weui_cell_ft">
          <img src="/service/validate_code/create" class="bk_validate_code"/>
      </div>
  </div>
</div>
<div class="weui_cells_tips"></div>
<div class="weui_btn_area">
  <a class="weui_btn weui_btn_primary" href="javascript:" onclick="onLoginClick();">登录</a>
</div>
<a href="/register" class="bk_bottom_tips bk_important">没有帐号? 去注册</a>
@endsection

@section('my-js')
<script type="text/javascript">
  $('.bk_validate_code').click(function () {
    $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
  });
    
    function onLoginClick() {
        var username = $('input[name=username]').val();
        if (username.length == 0){
            $('.bk_toptips').show();
            $('.bk_toptips span').html('账号不能为空');
            setTimeout(function () {
                $('.bk_toptips').hide();
            },2000);
            return;
        }
        if (username.indexOf('@') == -1){//手机号注册
            if (username.length != 11 || username[0] != 1){
                $('.bk_toptips').show();
                $('.bk_toptips span').html('账号格式不正确');
                setTimeout(function () {
                    $('.bk_toptips').hide();
                },2000);
                return;
            }else{
                if (username.indexOf('.') == -1){
                    $('.bk_toptips').show();
                    $('.bk_toptips span').html('账号格式不正确');
                    setTimeout(function () {
                        $('.bk_toptips').hide();
                    },2000);
                    return;
                }
            }

            //密码
            var password = $('input[name=password]').val();
            if (password.length < 6){
                $('.bk_toptips').show();
                $('.bk_toptips span').html('密码不能少于6位!');
                setTimeout(function () {
                    $('.bk_toptips').hide();
                },2000);
                return;
            }
            if (password){

            }
        }
    }
</script>
@endsection
