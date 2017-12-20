<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use RaspberryPiIOBundle\Services\TemperatureService;

class MbTemperatureSensorType extends AbstractType
{
	private $ts;

    public function __construct(TemperatureService $ts)
    {
        $this->ts = $ts;
    }
    
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$TemperatureSensorNameArray = [];
    	
    	foreach($this->ts->getSensorNameArray() as $name)
    	{
    		$TemperatureSensorNameArray[$name] = $name;
    	}
    	
        $builder->add('serialNumber', ChoiceType::class, array(
        	'choices' => $TemperatureSensorNameArray,
            'label'  => false
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbTemperatureSensor'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mbtemperaturesensor';
    }


}
