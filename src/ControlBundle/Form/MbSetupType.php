<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
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
            
        //    ->add('valve')
            
            ->add('pump', MbPumpType::class, array(
                'label'  => false,
                'attr' => array(
                    'class' => 'field form-inline'
                )	
            ))
            
            ->add('airTemp', MbTemperatureSensorType::class, array(
                'label'  => false,
                'attr' => array(
                    'class' => 'field form-inline'
                )	
            ))
            
            ->add('poolTemp', MbTemperatureSensorType::class, array(
                'label'  => false,
                'attr' => array(
                    'class' => 'field form-inline'
                )	
            ))
            
            ->add('panelTemp', MbTemperatureSensorType::class, array(
                'label'  => false,
                'attr' => array(
                    'class' => 'field form-inline'
                )	
            ))
            
            ->add('light', MbLightSensorType::class, array(
                'label'  => false,
                'attr' => array(
                    'class' => 'field form-inline'
                )	
            ))
        
			->add('save', SubmitType::class, array(
    		'attr' => array(
    			'class' => 'save pull-right btn btn-default save'
    		),
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
