<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\BacklogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('max_length' => 80, 'required' => true, 'label' => 'Sujet'))
            ->add('description', 'textarea', array('required' => false, 'label' => 'Description'))
            ->add('time', 'text', array('max_length' => 80, 'required' => false, 'label' => 'Temps'))
            ->add('path', 'text', array('max_length' => 80, 'required' => false, 'label' => 'Chemin'))
            ->add(
                'status',
                'entity',
                array(
                    'class' => 'Claroline\BacklogBundle\Entity\Status',
                    'property' => 'status',
                    'query_builder' => function ($repository) { return $repository->createQueryBuilder('p')->orderBy('p.statusName', 'ASC'); }

                )
            )
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Claroline\BacklogBundle\Entity\Ticket',
        ));
    }

    public function getName()
    {
        return 'ticket';
    }
}