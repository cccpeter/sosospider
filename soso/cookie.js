/**
 * [getCookie description]
 * @author cpeter
 * @param  {[type]} cname [description]
 * @return {[type]}       [description]
 */
var server="http://119.29.189.104/index.php/";
function getCookie(cname)
{
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}
function setCookie(cname,cvalue,sec)
{
  var d = new Date();
  d.setTime(d.getTime()+(sec*999));
  var expires = "Expires="+d.toGMTString();
  // alert(cname + "=" + cvalue + ";Path=/; " + expires);
  document.cookie = cname + "=" + cvalue + ";Path=/; " + expires;
}
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
    document.cookie= name + "="+cval+";Path=/;expires="+exp.toGMTString();
}
function getRootPath(){ 
  var strFullPath=window.document.location.href; 
  var strPath=window.document.location.pathname; 
  var pos=strFullPath.indexOf(strPath); 
  var prePath=strFullPath.substring(0,pos); 
  var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
  return(prePath+postPath); 
} 
/**
* 根据变量名获取匹配值
*/
function getQueryString(name) {
  var url = window.location.search; //获取url  
       var theRequest = new Object();  //新建对象用来保存参数
       if (url.indexOf("?") != -1) {  //判断url是否有？
          var str = url.substr(1);  //获取？后面的字符串如id=1&name=111之类的
          strs = str.split("&");  //根据&把字符串分着成数组
          for(var i = 0; i < strs.length; i ++) {  
             theRequest[strs[i].split("=")[0]]=decodeURI(strs[i].split("=")[1]); //再把如id=1形式的变成id:1
          }  
       }  
       return theRequest;
} 
/**
 * 发送请求
 */
function request(api){
    var url=server+api;
    var token=getCookie("token");
    var data={url:url,token:token,contentType:"application/x-www-form-urlencoded",}
    return data;
  //   alert(data.account)
  //   $.ajax({
  //     type: type,
  //     url: url,
  //     contentType: "application/x-www-form-urlencoded",
  //     beforeSend: function(request) {
  //         request.setRequestHeader("Authorization", token);
  //     },
  //     data:data,
  //     success: function(res) {
  //       switch (res.code){
  //         case "200":
  //         break;
  //         case "400":
  //           alert(res.msg);
  //         break;
  //         default:
  //           alert("未知错误");
  //         break;
  //       }
  //    }
  // })
}
