<?php

namespace Cli;

/**
 * 任务基类
 *
 * @namespace Cli
 * @author sky3hao<sky3hao@qq.com>
 */
class TaskBase
{
    /**
     * 默认的任务入口
     */
    public function indexAction()
    {
        echo "\nThis is the default action method.\n";
    }

    /**
     * 析构方法
     */
    public function __destruct()
    {
        exit(0);
    }
}
