<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use ControlBundle\Entity\MbScheduleTimesheet;

class MbProgramType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	
        	->add('entries', CollectionType::class, array(
            	'entry_type' => MbScheduleTimesheetType::class
        	))
        
			->add('save', SubmitType::class, array(
    		    'attr' => array(
    			    'class' => 'save pull-right btn btn-primary save',
    			    'style' => 'width:70px; text-align:center'
    		))
    	);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbProgram'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mbprogram';
    }


}
