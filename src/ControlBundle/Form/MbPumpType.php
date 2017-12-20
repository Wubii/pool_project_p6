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
    	$relayNameArray = [];
    	
    	foreach($this->rs->getNameArray() as $name)
    	{
    		$relayNameArray[$name] = $name;
    	}
    	
        $builder
        
        	->add('relayName', ChoiceType::class, array(
        		'choices' => $relayNameArray,
                'label'  => "Pump : ",
                'label_attr' => array('style=text-align:left'),
                //'attr' => array(
                	//'style' => 'width:300px; display:inline-flex; margin-left:23px'
                //)
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
