<?php
namespace Base;

class View
{
    private $templatePath;
    private $data;
    private $twig;

    public function __construct()
    {
    }

    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

//    public function render(string $tpl, $data = []): string
//    {
//        foreach ($data as $key => $value) {
//            $this->data[$key] = $value;
//        }
//        ob_start();
//        include $this->templatePath . '/' . $tpl;
//        $data = ob_get_clean();
//        return $data;
//    }

    public function render(string $tpl, $data = []) {
        $twig = $this->getTwig();

        ob_start(null, null,  PHP_OUTPUT_HANDLER_STDFLAGS );
        try {
            echo $twig->render($tpl, $data);
        } catch (\Exception $e) {
            trigger_error($e->getMessage());
        }

        return ob_get_clean();
    }

    public function getTwig()
    {
        if (!$this->twig) {
            $path = trim($this->templatePath);
            $loader = new \Twig\Loader\FilesystemLoader($path);
            $this->twig = new \Twig\Environment(
                $loader,
                ['cache' => $path . '_cache']
            );
        }

        return $this->twig;
    }
}
