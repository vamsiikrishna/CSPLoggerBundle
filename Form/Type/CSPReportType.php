<?php

namespace Sockam\CSPLoggerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CSPReportType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('documentUri')
            ->add('referrer')
            ->add('blockedUri')
            ->add('violatedDirective')
            ->add('originalPolicy');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'         => 'Sockam\CSPLoggerBundle\Entity\CSPReport',
            'csrf_protection'    => false,
            'allow_extra_fields' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sockam_csploggerbundle_cspreport';
    }
}
