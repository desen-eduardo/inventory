<?php

namespace App;

use Twig\Extra\Intl\IntlExtension;

abstract class Controller 
{   
    private string $viewName;
    private array $viewData;

    public function render(string $name, array $data = []): void
    {
        try {

			$this->viewData = $data;
			$this->viewName = $name;
			extract($this->viewData);
			
			$loader = new \Twig\Loader\FilesystemLoader('../Views/');
			$twig = new \Twig\Environment($loader);
			$twig->addExtension(new IntlExtension());

			$template = $twig->load($this->viewName.'.twig');
			$run = $template->render($this->viewData);

			echo $run;

		} catch(Exception $e) {
			throw new \Exception("Error: Não foi encontrado o template".$e->getMessage());
		}
    }

	public function redirect(string $name): void
	{
		header('Location:'.BASE_URL.$name);
	}

}