# imagettftext

这是关于php GD库的应用，这个源码将使您可以自定义的打印一些内容在图片上

get表单：

image=本地图像（与imageurl不能同时出现），默认=white.png（./images/white.png），可选

imageurl=远程图像（与image不能同时出现）默认=，可选

r=&g=&b=颜色r,g,b，默认r=0&g=0&b=0（范围0-255），可选

size=字体大小，默认=30（根据版本决定单位），可选

i=字体倾斜的角度，默认=0，可选

x=&y=起始文字的x、y坐标，默认x=10y=40，可选

font=字体文件，默认=./fonts/arialuni.ttf（Unicode），可选

text=文本，默认=（空白则等效直接输出背景图），可选
