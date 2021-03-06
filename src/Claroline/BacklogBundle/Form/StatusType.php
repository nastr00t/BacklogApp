<?php

namespace Claroline\BacklogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StatusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('statusName', 'text', array('max_length' => 80, 'required' => true, 'label' => 'Status'))
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Claroline\BacklogBundle\Entity\Status',
            )
        );
    }

    public function getName()
    {
        return 'status';
    }
}
