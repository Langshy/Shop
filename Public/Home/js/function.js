//login&&register
let login = $('#login');
let register = $('#register');

login.on('click',function () {
    login.addClass('show');
    register.removeClass('show');
    $('.login').show();
    $('.register').hide();
});
register.on('click',function () {
    register.addClass('show');
    login.removeClass('show');
    $('.login').hide();
    $('.register').show();
});

$('.close').on('click',function () {
    $('#l-Sin').hide();
});

$('.getLogin').on('click',function () {
    $('#l-Sin').show();
});

$('.vecodes').click(function (e) {
    e.preventDefault();
    let phone = $('input[name=phone]').val();
    let patten = /0?(13|14|15|18|17)[0-9]{9}/;
    if(phone==null || phone==''){
        alert('请填写手机号！');
        return;
    }else if(!patten.test(phone)){
        alert('请输入正确的手机号！');
        $('input[name=phone]').val('');
        return;
    }
    alert('已发送验证码！');
    $.ajax({
        url:"{:U('Home/Index/code')}",
        type:"POST",
        data:{"phone":phone},
        success:function (msg) {
            alert(msg);
        }
    })
});