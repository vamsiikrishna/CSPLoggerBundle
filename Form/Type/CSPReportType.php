<?php

namespace Sockam\CSPLoggerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('document-uri', TextType::class, [
                'property_path' => 'documentUri',
            ])
            ->add('referrer', TextType::class, [
                'property_path' => 'referrer',
            ])
            ->add('blocked-uri', TextType::class, [
                'property_path' => 'blockedUri',
            ])
            ->add('violated-directive', TextType::class, [
                'property_path' => 'violatedDirective',
            ])
            ->add('original-policy', TextType::class, [
                'property_path' => 'originalPolicy',
            ]);
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
