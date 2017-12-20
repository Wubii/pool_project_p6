<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MbSetupType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
            
            ->add('valve', MbValveType::class, array(
                'label'  => false
            ))
            
            ->add('pump', MbPumpType::class, array(
                'label'  => false
            ))
            
            ->add('airTemp', MbTemperatureSensorType::class, array(
                'label'  => "Air : ",
	            'label_attr' => array('style="margin-right:10px"'),
	            //'attr' => array(
	            //	'style' => 'width:300px; display:inline-flex; margin-left:83px'
	            //)	
            ))
            
            ->add('poolTemp', MbTemperatureSensorType::class, array(
                'label'  => "Pool water : ",
	            'label_attr' => array('style="margin-right:10px"'),
	            //'attr' => array(
	            //	'style' => 'width:300px; display:inline-flex; margin-left:30px'
	            //)
            ))
            
            ->add('panelTemp', MbTemperatureSensorType::class, array(
                'label'  => "Panel water : ",
	            'label_attr' => array('style="margin-right:10px"'),
	            //'attr' => array(
	            //	'style' => 'width:300px; display:inline-flex; margin-left:23px'
	            //)
            ))
            
            ->add('luminosity', MbLightSensorType::class, array(
                'label'  => false
            ))
        	
        	->add('luminosityThreshold', RangeType::class, array(
        		'label'  => "Set the light threshold : ",
                'label_attr' => array('style="margin-right:10px"'),
                'attr' => array(
                	"data-provide" => "slider",
                    "data-slider-min" => "1",
                    "data-slider-max" => "100",
                    //"data-slider-step" => "1",
                    "data-slider-value" => "50",
                    "style" => "width:100%;",
            )))
        	
        	->add('tempSetPoint', RangeType::class, array(
        		'label'  => "Set the default pool temperature : ",
                'label_attr' => array('style="margin-right:10px"'),
                'attr' => array(
                	"data-provide" => "slider",
                    "data-slider-min" => "15",
                    "data-slider-max" => "40",
                    //"data-slider-step" => "1",
                    "data-slider-value" => "27",
                    "style" => "width:100%;",
            )))
        
			->add('save', SubmitType::class, array(
    		'attr' => array(
    			'class' => 'save pull-right btn btn-primary save'
    		)
		));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbSetup'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mbsetup';
    }


}
