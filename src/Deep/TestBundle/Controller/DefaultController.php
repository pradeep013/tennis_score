<?php

namespace Deep\TestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function __construct($templating)
    {
		$this->templating = $templating;
        $this->playerA = 0 ;
        $this->playerB = 0 ;
    }

    public function indexAction()
    {
        $this->playerAscores();
        $this->playerAscores();
        $this->playerBscores();
        $this->playerAscores();
        $this->getScore();
        $data = $this->templating->render('DeepTestBundle:Default:index.html.twig', array('a' => $this->playerA , 'b' => $this->playerB));
        return new Response($data);

    }

    public function playerAscores()
    {
        $this->playerA++ ;
    }

    public function playerBscores()
    {
        $this->playerB++ ;
    }

    public function getScore()
    {
        $this->playerA = $this->scoreTranslate($this->playerA);
        $this->playerB = $this->scoreTranslate($this->playerB);
    }

    public function scoreTranslate($playerScore)
    {
        switch ($playerScore) {
            case 0:
                return "0" ;

            case 1:
                return "15" ;

            case 2:
                return "30";
            
            case 3:
                return "40";

            default:
                return "WTF";
        }
    }
}
