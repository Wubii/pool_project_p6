<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

use RaspberryPiIOBundle\Services\RelayService;

class MbValveType extends AbstractType
{
	private $rs;

    public function __construct(RelayService $rs)
    {
        $this->rs = $rs;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$relayNameArray = [];
    	
    	foreach($this->rs->getNameArray() as $name)
    	{
    		$relayNameArray[$name] = $name;
    	}
    	
        $builder
        
        	->add('relayOpenName', ChoiceType::class, array(
        		'choices' => $relayNameArray,
                'label'  => "Relay open : ",
                'label_attr' => array('style="margin-right:10px"'),
        	)) 
        	
        	->add('relayCloseName', ChoiceType::class, array(
        		'choices' => $relayNameArray,
                'label'  => "Relay close : ",
                'label_attr' => array('style="margin-right:10px"'),
        	))
        	
        	/*->add('timeToOpen', RangeType::class, array(
                'label'  => "Time to open : ",
                'label_attr' => array('style="margin-right:10px"'),
                'attr' => array(
                	"data-provide" => "slider",
                    "data-slider-min" => "1",
                    "data-slider-max" => "60",
                    "data-slider-step" => "1",
                    "data-slider-value" => "6",
                    "style" => "width:100%;",
               	)
        	)) 
        	
        	->add('timeToClose', RangeType::class, array(
                'label'  => "Time to close : ",
                'label_attr' => array('style="margin-right:10px"'),
                'attr' => array(
                	"data-provide" => "slider",
                    "data-slider-min" => "1",
                    "data-slider-max" => "60",
                    "data-slider-step" => "1",
                    "data-slider-value" => "15",
                    "style" => "width:100%;",
               	)
        	))*/;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbValve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mbvalve';
    }


}
