<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;

use ControlBundle\Entity\MbSensorData;

class HistoryController extends Controller
{
	const COLOR_BLUE       = "#0033cc";
	const COLOR_BLUE_LIGHT = "#3399ff";
	const COLOR_BLACK      = "#1a1a1a";
	const COLOR_YELLOW     = "#e6b800";
 	
    /**
    * @Route("/history", name="history")
    */
    public function historyAction(Request $request)
    {
    	$dateArray       = [];
    	$airDataArray    = [];
    	$poolDataArray   = [];
    	$panelDataArray  = [];
    	$luminosityArray = [];
    	
    	$dataArray = $this->getDoctrine()->getManager()->getRepository('ControlBundle:MbSensorData')->findAll();
    	
    	foreach ($dataArray as $item)
        {
            array_push($dateArray      , $item->getDate()->format("d/m - H::i"));
            array_push($airDataArray   , $item->getAirTemp());
            array_push($poolDataArray  , $item->getPoolTemp());
            array_push($panelDataArray , $item->getPanelTemp());
            array_push($luminosityArray, $item->getLuminosity());
        }
	    
	    $series = array(
    		array(
        		'name'   => 'Luminosity',
        		'type'   => 'line',
        		'color'  => self::COLOR_YELLOW,
        		'yAxis'  => 1,
        		'data'   => $luminosityArray,
        		'marker' => array('enabled' => false)
    		),
    		
    		array(
        		'name'   => 'Air',
        		'type'   => 'line',
        		'color'  => self::COLOR_BLUE_LIGHT,
        		'data'   => $airDataArray,
        		'marker' => array('enabled' => false)
    		),
    		
    		array(
    			'name'   => 'Pool', 
    			'color'  => self::COLOR_BLUE, 
    			'data'   => $poolDataArray, 
    			'marker' => array('enabled' => false)
    		),
    		
    		array(
    			'name'   => 'Panel', 
    			'color'  => self::COLOR_BLACK, 
    			'data'   => $panelDataArray, 
    			'marker' => array('enabled' => false)
    		),
		);
		$yData = array(
	    	array(
	       		'labels' => array(
	       			'formatter' => new Expr('function () { return this.value + "°C" }'),
	           	//  'style'     => array('color' => '#AA4643')
	       		),
	       		'title' => array(
	           		'text'  => 'Temperature',
	           	//  'style' => array('color' => '#AA4643')
	       		),
    		),
    		
    		array(
        		'labels' => array(
            		'formatter' => new Expr('function () { return this.value + "" }'),
	            //	'style'     => array('color' => '#4572A7')
        		),
        		//'gridLineWidth' => 0,
	       		//'softMax' => 1,
        		'title' => array(
            		'text'  => 'Luminosity',
            	//	'style' => self::COLOR_BLACK
        		),
	       		'opposite' => true,
	       		'min'      => 0,
	       		'max'      => 100,
	       		//'tickInterval'=> 0.5,
    		),
		);
	
		$ob = new Highchart();
		$ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
		$ob->chart->type('line');
		$ob->title->text('TEMPERATURE AND LUMINOSITY HISTORY');
	    $ob->subtitle->text('source : Raspberry Pi 3');
		$ob->xAxis->categories($dateArray);
		$ob->yAxis($yData);
		$formatter = new Expr('function () 
			{
		    	var unit = 
		    	{
		        	"Air": "°C",
		            "Luminosity": "",
		            "Pool" : "°C",
		            "Panel" : "°C"
		        }[this.series.name];
		        return this.x + " = <b>" + this.y + "</b> " + unit;
	        }'
	    );
		$ob->tooltip->formatter($formatter);
		$ob->chart->zoomType('x');
		$ob->series($series);

	    return $this->render('default/history.html.twig', array(
	    	'chart_data' => $ob,
	    ));
    }
}
