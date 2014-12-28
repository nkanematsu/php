<?php
/**
 * ClassLoader
 */
class ClassLoader
{
    private $extension = '.php';
    private $directories;
    
    /**
     * Constructor
     *
     * @param  none
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     * インスタンスを取得する
     *
     * @param  none
     * @return ClassLoader self
     */
    public function getInstance()
    {
        return new self();
    }
    
    /**
     * ディレクトリを追加する
     *
     * @param  string      $directory
     * @return ClassLoader self
     */
    public function pushDirectory($directory)
    {
        $this->directories[] = $directory;
        return $this;
    }
    
    /**
     * ディレクトリを取得する
     *
     * @param  none
     * @return array $directories
     */
    public function getDirectories()
    {
        return $this->directories;
    }
    
    /**
     * 拡張子を設定する
     *
     * @param  string      $extension
     * @return ClassLoader self
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
        return $this;
    }
    
    /**
     * 拡張子を取得する
     *
     * @param  none
     * @return string $extension
     */
    public function getExtension()
    {
        return $this->extension;
    }
    
    /**
     * autoloadの実装を登録する
     *
     * @param  none
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }
    
    /**
     * autoloadの実装の登録を解除する
     *
     * @param  none
     * @return void
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }
    
    /**
     * クラスを読み込む
     *
     * @param  string $className
     * @return void
     */
    public function loadClass($className)
    {
        $fileName = str_replace('_', DIRECTORY_SEPARATOR, $className) . $this->extension;
        foreach ($this->directories as $directory) {
            if (is_readable($direcotry . DIRECTORY_SEPARATOR . $fileName)) {
                require $direcotry . DIRECTORY_SEPARATOR . $fileName;
            }
        }
    }
}
