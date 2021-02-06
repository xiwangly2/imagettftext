# imagettftext
<!--本项目开源地址：https://github.com/xiwangly2/imagettftext-->
imagettftext是image ttf text的连写（中文：图像文本，文字转图像）<br/>
这是关于php GD库的应用，这个源码将使您可以自定义的打印一些内容在图片上（文字转图片）<br/>
建议在php7.4的版本下运行,下载后最好把文件夹.\*-master（其它分支同理）重命名为.\*，并且推荐解析到该文件夹，或者直接把下载后文件夹内的文件（选择性）拖放到wwwroot（一般指网站根目录）

**更新日志**
> 2021/2/6更新
> 2020/7/29重大更新：（强烈建议已下载的用户重新下载，可以选择性下载）<br/>
> 修复了远程图片不能正确打印输出的问题，修复了动态图片（及301、302跳转）链接不能输出的问题<br/>
> 精简了代码，优化返回速度<br/>
> 修复了图片格式及head头的mime不能正确判断的问题
> <br/>2020/8/1更新：现在可以输出条形码（需要选择正确的字体）
> <br/>2020/8/17更新：基于安全性的更新，感谢<a href="https://github.com/iVampireSP">@iVampireSP</a>的帮助
> <br/>2020/8/20更新：支持更多图片类型，精简代码，优化速度（采用面向过程写法）<!--如果出现"imagettftext(): Could not find/open font"报错，请检查这个字体文件是否存在，并尝试在$font变量中增加`dirname(\_\_FILE\_\_)`或`realpath()`（需要根据代码调整位置），即使用绝对路径访问文件。为了能正常显示markdown，这里使用了转义-->
> <br/>2020/8/25更新：解决部分服务器不能引用字体文件的问题（统一采用了使用绝对路径引用字体文件）

**get表单：**
> image=本地图像（如果imageurl!=（空），则此项无效），默认=white.png（./images/white.png），可选<br/>
> imageurl=远程图像，默认=（空），可选<br/>
> r=&g=&b=颜色r,g,b，默认r=0&g=0&b=0（范围0-255），可选<br/>
> size=字体大小，默认=30（根据版本决定单位），可选<br/>
> i=字体倾斜的角度，默认=0，可选<br/>
> x=&y=起始文字的x、y坐标，默认x=10y=40，可选<br/>
> font=字体文件，默认=./fonts/arialuni.ttf（Unicode标准），可选<br/>
> text=文本（强烈建议字符串先进行url(utf-8)编码再提交get表单），默认=（空白则等效直接输出背景图），可选<br/>

**字体说明**
<br/>如果脚本有系统读权限，可直接链接系统字体文件
<br/>为了减少此项目的大小，更多字体文件请到`fonts`分支下载
<br/>已知支持ttf,ttc字体文件，更多待测
<br/>字体均来源于网络及系统原文件，如有侵权请联系作者删除！

注意提交get表单时，对于包含get参数的文本需要对参数进行url编码

**使用举例：**
<br/>[举例1](http://106.52.30.88/imagettftext/?text=hello+world&image=blackboard.jpeg&x=100&y=120&r=255&g=255&b=255&i=2&size=40&font=fonts/msyh.ttf)：![举例1](http://106.52.30.88/imagettftext/?text=hello+world&image=blackboard.jpeg&x=100&y=120&r=255&g=255&b=255&i=2&size=40&font=fonts/msyh.ttf)<br/>
[举例2](http://api.xiwangly.xyz/imagettftext/?text=%E8%BF%99%E6%98%AF%E4%B8%80%E6%9D%A1%E6%B5%8B%E8%AF%95%E6%96%87%E6%9C%AC&image=blackboard.jpeg&x=100&y=120&r=255&g=255&b=255&i=2&size=40&font=fonts/msyh.ttf)：![举例2](http://api.xiwangly.xyz/imagettftext/?text=%E8%BF%99%E6%98%AF%E4%B8%80%E6%9D%A1%E6%B5%8B%E8%AF%95%E6%96%87%E6%9C%AC&image=blackboard.jpeg&x=100&y=120&r=255&g=255&b=255&i=2&size=40&font=fonts/msyh.ttf)<br/>

**在QRSpeed中的应用举例：**
```
白板 [\s\S]*(.*)[\s\S]*
t:白板 
a:$替换 Э %参数-1%Э%t%Э$
绘制白板结果：【±img=http://106.52.30.88/imagettftext/?text=%a%&image=white2.png±】
```
感谢@的美化版imagettftext：http://api.muxiuge.cn/imagetext
