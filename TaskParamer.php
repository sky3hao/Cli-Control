<?php

namespace Cli;

use Util\Common;

/**
 * 任务参数信息
 *
 * @namespace Cli
 * @author kevin<sky3hao@qq.com> 
 */
class TaskParamer
{
    
    /**
     * 默认的任务名
     *
     * @var string
     */
    const DEFAULT_TASK = 'Main';
    
    /**
     * 默认的方法名
     *
     * @var string
     */
    const DEFAULT_ACTION = 'index';
    
    /**
     * 任务名后缀
     *
     * @var string
     */
    const TASK_SUFFIX = 'Task';
    
    /**
     * 方法名后缀
     *
     * @var string
     */
    const ACTION_SUFFIX = 'Action';
    
    /**
     * 模块名
     *
     * @var string
     */
    protected $moduleName;
    
    /**
     * 任务名
     *
     * @var string
     */
    protected $taskName;
    
    /**
     * 方法名
     *
     * @var string
     */
    protected $actionName;
    
    /**
     * 方法的参数
     *
     * @var array
     */
    protected $params;
    
    /**
     * TaskParamer实例化
     * 
     * @param string $module 模块名
     * @param string $task 任务文件名
     * @param string $action 执行方法
     */
    public function __construct($module, $task = self::DEFAULT_TASK, $action = self::DEFAULT_ACTION)
    {
        $this->moduleName = strtolower($module);
        $this->taskName = ucfirst($task);
        $this->actionName = $action;
    }
    
    /**
     * 设置参数值
     * 
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
    
    /**
     * 获取参数值
     * 
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
    
    /**
     * 获取当前的模块名
     * 
     * @return string
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }
    
    /**
     * 获取当前的类名
     * 
     * @return string
     */
    public function getClassName()
    {
        return Common::concatNamespace('app', $this->moduleName, $this->getTaskName());
    }
    
    /**
     * 获取当前类所在的文件路径
     * 
     * @return string
     */
    public function getClassPath()
    {
        $task = empty($this->taskName) ? self::DEFAULT_TASK : $this->taskName;
        return Common::concatPath(APP_PATH, 'app', $this->moduleName, 'task', $task . '.php');
    }
    
    /**
     * 获取执行动作的方法名
     * 
     * @return string
     */
    public function getActionName()
    {
        if (empty($this->actionName)) {
            return self::DEFAULT_ACTION . self::ACTION_SUFFIX;
        }
        return $this->actionName . self::ACTION_SUFFIX;
    }
    
    /**
     * 获取任务名
     * 
     * @return string
     */
    public function getTaskName()
    {
        if (empty($this->taskName)) {
            return self::DEFAULT_TASK . self::TASK_SUFFIX;
        }
        return $this->taskName . self::TASK_SUFFIX;
    }
}
