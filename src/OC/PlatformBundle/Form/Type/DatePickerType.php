<?php
// src/Acme/DemoBundle/Form/Type/GenderType.php
namespace OC\PlatformBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DatePickerType extends AbstractType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'attr' => array('class' => 'datePicker')
        ));
    }
    public function getParent()
    {
        return 'date';
    }

    public function getName()
    {
        return 'datePicker';
    }
}