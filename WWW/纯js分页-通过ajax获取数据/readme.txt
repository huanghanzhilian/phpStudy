version 1.0
Date: 2014-10-14

介绍：
1：可以使用ajax获取列表数据，当然其他形式也行，最后应该把数据转换成json格式的字符串，之后会将转换为js的array数组。
2：调用是使用pagetool = new Pageglobal(data,pama,"list","pagecount");其中data为列表数据(json字符串)，格式可以参考例子，pama是数据列名，将按顺序将数据显示到表格中，"list"为显示数据的地方，也就是在数据table中的tbody的id，"pagecount"是显示分页脚本的地方，在table后建立的div的id。其中pama的格式为var pama = ["id1","id2","id3","id4"];实例化pagetool后，要调用pagetool.init();进行第一次加载数据和分页脚本。
3：此工具目前功能还比较简单，只能单纯显示数据，有其他需求可以联系探讨。
不在做伸手党——