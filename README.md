symfony_test 个人学习symfony2 项目
============

目前通过的模块：

1. fosuserbundle user_manager 方式的新增，删除，修改用户
2. 用户权限访问控制模块（并没有完全按照官方的ACL来做），事实上也可以说是官方的方法。官方的例子业务过于复杂，事实上我们可以简单地实现我们的需求。
3. 例子中对fosuserbundle用得比较多，事件、服务等都有使用。

使用方法：

1. 使用命令创建数据库，并创建好数据表。
2. 访问admin路由看到界面
3. 首先创建一个权限，然后创建一个用户组并勾上权限，再创建一个用户勾上刚刚创建的用户组。
4. 进行测试，访问admin/data路由。若结果为access deny表明没有权限。查看代码databundle下的控制器。isGranted里面的数组，配置了要检测的权限。
5. 当然项目当中这样使用并不灵活。可以设计成自动检测权限：获取当前action 的路由作为检测对象，权限配置时的权限都写成路由即可。
6. 核心代码：VoterBundle内的security中的TestVoter.php 实现的voterInterface.
