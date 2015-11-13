# Cli-Control

# 简介

目标: 统一入口, 管理PHP CLI程序, 包括crontab脚本, 后台任务, 守护进程等.

# 概述

- [命令](#命令)
- [创建第一个Task](#创建第一个Task)
- [执行任务举例](#执行任务举例)

# 使用说明

## 命令

```shell
方式一:
$ php task.php moduleName/taskName/actionName/ param1 param2 ...

方式二:
$ php task.php moduleName/taskName/actionName key1=par1 key2=par2 ...
```

## 创建第一个Task

这里创建一个新的任务类
```php
namespace App;

class MainTask extends TaskBase
{
    public function indexAction()
    {
        echo 'hello world';
    }
    public function otherAction($option)
    {
        echo $option;
    }
}
```

## 执行任务举例

上面创建的任务类,可以使用下面的命令执行:
```shell
$ php task.php app/Main/index
```

由于Main是默认的任务命, index是默认的动作名, 所以可以省略(但是如果动作名不是默认那么都不能省略):
```shell
$ php task.php app
```

带参方式有两种:
```shell
$php task.php app/Main/other option=kevin
$php task.php app/Main/other kevin
```
