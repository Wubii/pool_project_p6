<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use RaspberryPiIOBundle\Services\LightService;

class MbLightSensorType extends AbstractType
{
	private $ls;

    public function __construct(LightService $ls)
    {
        $this->ls = $ls;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$lightNameArray = [];
    	
    	foreach($this->ls->getSensorNameArray() as $name)
    	{
    		$lightNameArray[$name] = $name;
    	}
    	
        $builder
        	->add('serialNumber', ChoiceType::class, array(
        		'choices' => $lightNameArray,
            	'label'  => "Light : ",
            	'label_attr' => array('style="margin-right:10px"'),
        	));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbLightSensor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mblightsensor';
    }


}
