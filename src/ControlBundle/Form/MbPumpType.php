<?php

namespace ControlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use RaspberryPiIOBundle\Services\RelayService;

class MbPumpType extends AbstractType
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
    	$pumpNameArray = [];
    	
    	foreach($this->rs->getNameArray() as $name)
    	{
    		$pumpNameArray[$name] = $name;
    	}
    	
        $builder
        
        	->add('relayName', ChoiceType::class, array(
        		'choices' => $pumpNameArray,
                'label'  => false
        	));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ControlBundle\Entity\MbPump'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'controlbundle_mbpump';
    }


}
