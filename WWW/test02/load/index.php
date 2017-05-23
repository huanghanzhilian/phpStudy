<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>使用load()方法异步请求数据</title>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js" type="text/javascript"></script>
<style>
#divtest
{
    width: 282px;
}
#divtest .title
{
    padding: 8px;
    background-color:Blue;
    color:#fff;
    height: 23px;
    line-height: 23px;
    font-size: 15px;
    font-weight: bold;
}
ul
{
    float: left;
    width: 280px; 
    padding: 5px 0px;
    margin: 0px;
    font-size: 14px;
    list-style-type: none;
}
img
{
    margin: 8px;
}
ul li
{
    float: left;
    width: 280px;
    height: 23px;
    line-height: 23px;
    padding: 3px 8px;
}
.fl
{
    float: left;
}
.fr
{
    float: right;
}
</style>
</head>

<body> 
        <div id="divtest">
            <div class="title">
                <span class="fl">我最爱吃的水果</span> 
                <span class="fr">
                    <input id="btnShow" type="button" value="加载" />
                </span>
            </div>
            <ul></ul>
        </div>
        
        <script type="text/javascript">
            $(function () {
                $("#btnShow").bind("click", function () {
                    var $this = $(this);
                    $("ul")
                    .html("<img src='jz.gif' alt=''/>")
                    .load("jiazai.html li",function(){
                        $this.attr("disabled", "true");
                    });
                })
            });
        </script>
    </body> 
</html>