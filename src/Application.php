<?php

namespace Gip;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application
{

    function loadTwig(): Environment
    {
        $loader = new FilesystemLoader('templates');
        return new Environment($loader, [
            'cache' => false
        ]);
    }

    public function getData(string $page): array
    {
        $data['title'] = "DP-TECH";
        $data['navigation'] = $this->getNavigation($page);
        return $data;
    }

    private function getNavigation(string $requestedPage) : array
    {
        $result = [];
        $pages = [Navigation::HOME, Navigation::PRODUCTS, Navigation::CONTACTS, Navigation::ABOUT, Navigation::LOGIN, Navigation::CART];
        foreach ($pages as $page) {
            $result[] = [
                'title' => $this->getTitle($page),
                'href' => $this->getHref($page),
                'active' => ($page == $requestedPage),
                'icon' => $this->getIcon($page)
            ];
        }
        return $result;
    }

    /**
     * @param string $page
     * @return string
     */
    public function getTitle(string $page): string
    {
        if ($page == Navigation::CART)  return "" ;

        return $page;
    }

    /**
     * @param string $page
     * @return string
     */
    public function getIcon(string $page): string
    {
        if ($page == Navigation::CART) return "fa fa-shopping-cart";
        return '';
    }

    /**
     * @param string $page
     * @return string
     */
    public function getHref(string $page): string
    {
        if ($page == Navigation::HOME) $page = 'index';
        return $page . '.php';
    }
}
